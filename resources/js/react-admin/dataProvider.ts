// in resources/js/react-admin/dataProvider.ts
import { fetchUtils } from 'react-admin';
import jsonServerProvider from "ra-data-json-server";
import { stringify } from 'query-string';

const httpClient = (url, options = {}) => {
    if (!options.headers) {
        options.headers = new Headers({ Accept: 'application/json' });
    }
    const token = localStorage.getItem('auth') ? JSON.parse(localStorage.getItem('auth')) : undefined
    if (token) {
        options.headers.set('Authorization', `${token.token_type} ${token.access_token}`);
    }
    return fetchUtils.fetchJson(url, options);
};

const dataProvider = jsonServerProvider(
    import.meta.env.VITE_JSON_SERVER_URL,
    httpClient
);

const originalDataProvider = jsonServerProvider(
    import.meta.env.VITE_JSON_SERVER_URL,
    httpClient
);

const apiUrl = `${import.meta.env.VITE_JSON_SERVER_URL}`;

dataProvider.getMany = (resource, params) => {
    const query = {
        id: params.ids,
    };
    const url = `${apiUrl}/${resource}?${stringify(query, { arrayFormat: 'bracket' })}`;
    return httpClient(url).then(({ json }) => ({ data: json }));
};

dataProvider.createToken = (email, password) => {
    return httpClient(`${apiUrl}/tokens`, {
        method: 'POST',
        body: JSON.stringify({ email, password }),
        headers: new Headers({ 'Content-Type': 'application/json' }),
    });
};

dataProvider.deleteToken = () => {
    return httpClient(`${apiUrl}/tokens`, {
        method: 'DELETE',
        headers: new Headers({ 'Content-Type': 'application/json' }),
    });
};

dataProvider.getIdentity = () => {
    return httpClient(`${apiUrl}/user`, {
        method: 'GET',
        headers: new Headers({ 'Content-Type': 'application/json' }),
    });
};

dataProvider.postLogin = (email, password) => {
    return httpClient(`${apiUrl}/login`, {
        method: 'POST',
        body: JSON.stringify({ email, password }),
        headers: new Headers({ 'Content-Type': 'application/json' }),
    });
};

dataProvider.postLogout = () => {
    return httpClient(`${apiUrl}/logout`, {
        method: 'POST',
        headers: new Headers({ 'Content-Type': 'application/json' }),
    });
};

dataProvider.update = (resource, params) => {
    if (comprobarResource(resource, params)) {
        return originalDataProvider.update(resource, params);
    }

    let formData = new FormData();
    for (const property in params.data) {
        formData.append(`${property}`, `${params.data[property]}`);
    }

    asignarFichero(resource, formData, params)
    formData.append('_method', 'PUT')

    const url = `${apiUrl}/${resource}/${params.id}`
    return httpClient(url, {
        method: 'POST',
        body: formData,
    })
        .then(json => {
            return {
                ...json,
                data: json.json
            }
        })
}

function comprobarResource (resource, params) {
    if (resource !== 'proyectos' || !params.data.attachments) return false
    if (resource !== 'users' || !params.data.attachments) return false
    return true
}

function asignarFichero (resource, formData, params) {
    if (resource === 'proyectos') formData.append('fichero', params.data.attachments.rawFile)
    if (resource === 'users') formData.append('avatar', params.data.attachments.rawFile)
}


export { dataProvider };
