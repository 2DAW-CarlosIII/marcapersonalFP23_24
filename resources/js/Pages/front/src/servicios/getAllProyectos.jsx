import { apiUrl } from "../settings";

export function getAllProyectos () {

    // Usamos fetch para recuperar los post de la REST API. Puesto que hacemos
    // una petición al servidor y esta puede tardar un tiempo en resolverse usaremos
    // una promesa, la respuesta de la REST API es los que devolvemos
    console.log("getallPROYECTOS")
    return fetch(apiUrl + "/proyectos")
    .then(response => response.json())
    .then(response => {
        console.log("PROYECTOS: con datos", response)
        const data = response;
        return (data)});
}
