<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use App\Models\Proyecto;
use Illuminate\Support\Facades\File;
use ZipArchive;

class GitHubServiceProvider extends ServiceProvider
{

    const GITHUB_API_VERSION = '2022-11-28';
    const GITHUB_API_ENDPOINT = 'https://api.github.com';
    protected $client;
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



    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::GITHUB_API_ENDPOINT,
            'headers' => [
                'Accept' => 'application/vnd.githubjson',
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

        if($githubResponse->getStatusCode() === 201) {
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

        public function pushZipFiles(Proyecto $proyecto, $rutaCiclo)
        {
            $tmpdir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $proyecto->getRepoNameFromURL();
            $this->unzipFiles($proyecto, $tmpdir);
            $files = collect(File::allFiles($tmpdir));
            $files->each(function ($file, $key) use ($proyecto, $rutaCiclo) {
                $this->sendFile($proyecto, $file, $rutaCiclo);
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

        public function getShaFile($repoName, $file,$rutaCiclo)
        {
            $owner = env('GITHUB_OWNER');
            $path = $file->getRelativePathname();
            try {
                $response = $this->client->get("/repos/{$owner}/{$repoName}/contents/{$rutaCiclo}/{$path}");
            } catch (\Exception $e) {
            }

            if (isset($response) && $response->getStatusCode() === 200) {
                $sha = json_decode($response->getBody(), true)['sha'];
            } else {
                $sha = null;
            }
            return $sha;
        }

        public function sendFile(Proyecto $proyecto, $file, $rutaCiclo)
        {
            $repoName = $proyecto->getRepoNameFromURL();
            $owner = env('GITHUB_OWNER');
            $path = $file->getRelativePathname();
            $sha = $this->getShaFile($repoName, $file, $rutaCiclo);
            //Creamos la ruta añadiendo la ruta del ciclo / ruta del archivo
            $response = $this->client->put("/repos/{$owner}/{$repoName}/contents/{$rutaCiclo}/{$path}", [
                'json' => [
                    'message' => 'Add ' . $file->getRelativePathname(),
                    'content' => base64_encode(file_get_contents($file->getRealPath())),
                    'sha' => $sha
                ]
            ]);
            return $response;
        }

}
