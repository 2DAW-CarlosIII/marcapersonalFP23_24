<?php

namespace App\Providers;

use App\Models\Proyecto;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use ZipArchive;
use Illuminate\Support\Str;


class GitHubServiceProvider extends ServiceProvider
{
    const GITHUB_API_VERSION = '2022-11-28';
    const GITHUB_API_ENDPOINT = 'https://api.github.com';
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::GITHUB_API_ENDPOINT,
            'headers' => [
                'Accept' => 'application/vnd.github+json',
                'Authorization' => 'Bearer ' . env('GITHUB_TOKEN'),
                'X-GitHub-Api-Version' => self::GITHUB_API_VERSION,
            ]
        ]);
    }

    public function createRepo(Proyecto $proyecto)
    {
        $owner = env('GITHUB_OWNER');
        $githubResponse = $this->client->post("/orgs/{$owner}/repos", [
            'json' => $proyecto->getGithubSettings()
        ]);

        if ($githubResponse->getStatusCode() === 201) {

            $githubResponse = $this->client->get($githubResponse->getHeader('Location')[0]);
        }

        return $githubResponse;
    }

    public function deleteRepo(Proyecto $proyecto)
    {
        $owner = env('GITHUB_OWNER');
        $repo = $proyecto->getRepoNameFromURL();
        return $this->client->delete("/repos/{$owner}/{$repo}");
    }


    public function pushZipFiles(Proyecto $proyecto, $rutaArchivos, $copy)
    {
        $tmpdir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $proyecto->getRepoNameFromURL();
        $this->unzipFiles($proyecto, $tmpdir);
        $files = collect(File::allFiles($tmpdir));

        $files->each(function ($file, $key) use ($proyecto, $rutaArchivos, $copy) {
            $this->sendFile($proyecto, $file, $rutaArchivos, $copy);
        });

        File::deleteDirectory($tmpdir);
    }

    public function unzipFiles(Proyecto $proyecto, $tmpdir)
    {
        $zip = new ZipArchive;
        $zipPath = storage_path()
            . DIRECTORY_SEPARATOR . "app"
            . DIRECTORY_SEPARATOR . "public"
            . DIRECTORY_SEPARATOR . $proyecto->fichero;
        $zip->open($zipPath);
        $zip->extractTo($tmpdir);
        $zip->close();
    }

    public function getShaFile($repoName, $file, $rutaArchivos)
    {
        $owner = env('GITHUB_OWNER');
        $path = $file->getRelativePathname();
        try {

            $response = $this->client->get("/repos/{$owner}/{$repoName}/contents/$rutaArchivos/{$path}");
        } catch (\Exception $e) {
        }

        if (isset($response) && $response->getStatusCode() === 200) {
            $sha = json_decode($response->getBody(), true)['sha'];
        } else {
            $sha = null;
        }
        return $sha;
    }

    public function getZipFileFromRepo($repoURL)
    {
        $rutaArchivos = $repoURL . '/archive/refs/heads/master.zip';

        $nombreZip = Str::afterLast($repoURL, '/');
        $nombreZipExtension = $nombreZip . '.zip';

        // Utiliza el cliente Guzzle para descargar el archivo ZIP y almacenarlo temporalmente
        $response = $this->client->get($rutaArchivos);

        if ($response->getStatusCode() === 200) {
            $zipContent = $response->getBody()->getContents();

            // Almacena el contenido ZIP en la carpeta storage
            $zipPath = storage_path('app/public/') . $nombreZipExtension;
            file_put_contents($zipPath, $zipContent);

            return $nombreZipExtension;
        }

        return null;
    }


    public function sendFile(Proyecto $proyecto, $file, $rutaArchivos, $copy)
    {

        if ($copy){
            $repoName = $rutaArchivos;
        } else {
            $repoName = $proyecto->getRepoNameFromURL();
        }

        $owner = env('GITHUB_OWNER');
        $path = $file->getRelativePathname();
        $sha = $this->getShaFile($repoName, $file, $rutaArchivos);
        //$proyecto->url_github += $path;

        if ($copy){
            $response = $this->client->put("/repos/{$owner}/{$repoName}/contents/{$path}", [
                'json' => [
                    'message' => 'Add ' . $file->getRelativePathname(),
                    'content' => base64_encode(file_get_contents($file->getRealPath())),
                    'sha' => $sha
                ]
            ]);
        } else {
            $response = $this->client->put("/repos/{$owner}/{$repoName}/contents/$rutaArchivos/{$path}", [
                'json' => [
                    'message' => 'Add ' . $file->getRelativePathname(),
                    'content' => base64_encode(file_get_contents($file->getRealPath())),
                    'sha' => $sha
                ]
            ]);
        }
        return $response;
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
