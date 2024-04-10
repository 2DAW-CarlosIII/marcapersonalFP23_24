import { apiUrl } from "../settings";

export function getAllAlumnos () {

    // Usamos fetch para recuperar los post de la REST API. Puesto que hacemos
    // una petición al servidor y esta puede tardar un tiempo en resolverse usaremos
    // una promesa, la respuesta de la REST API es los que devolvemos
    return fetch( apiUrl + "/estudiantes?_start=1&_end=10000")

    .then(response => response.json())
    .then(response => {
        //console.log("ALUMNOS: con datos", response)
        const data = response;
        return (data)});
}
