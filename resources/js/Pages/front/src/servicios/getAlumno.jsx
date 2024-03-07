import { apiUrl } from "../settings";

export function getAlumno (id) {

    // Usamos fetch para recuperar los post de la REST API. Puesto que hacemos
    // una petición al servidor y esta puede tardar un tiempo en resolverse usaremos
    // una promesa, la respuesta de la REST API es los que devolvemos

    //** DE MOMENTO NO USAMOS EL ID, CUANDO AÑADAMOS EL ENDPOINT CORRECTO LO USAREMOS */
    return fetch(apiUrl + "/users/" + id)

    .then(response => response.json())
    .then(response => {
        console.log("ALUMNO: con datos", response)
        const data = response;
        return (data)});
}
