import { apiUrl } from "../settings";

export function getAllPerfiles () {

    // Usamos fetch para recuperar los post de la REST API. Puesto que hacemos
    // una petición al servidor y esta puede tardar un tiempo en resolverse usaremos
    // una promesa, la respuesta de la REST API es los que devolvemos
    //return fetch("https://run.mocky.io/v3/39a28fc6-d19f-42ac-9a3c-ecc29b4cdb27")
    // TODO: Change the URL to the real of "perfiles competenciales"
    return fetch(apiUrl + "/competencias")



    .then(response => response.json())
    .then(response => {
        const data = response;
        return (data)})
    .catch(err => {
        console.log("sin datos");
    });
}
