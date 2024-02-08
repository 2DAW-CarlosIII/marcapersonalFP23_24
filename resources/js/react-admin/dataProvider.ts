// en resources/js/react-admin/dataProvider.ts
import jsonServerProvider from 'ra-data-json-server';
import { stringify } from 'query-string';
import { fetchUtils } from 'ra-core';

const apiUrl = import.meta.env.VITE_JSON_SERVER_URL;

const dataProvider = jsonServerProvider(
    apiUrl
);

const httpClient = (url, options = {}) => {
    return fetchUtils.fetchJson(url, options);
};

dataProvider.getMany = (resource, params) => {
    const query = {
        id: params.ids,
    };
    const url = `${apiUrl}/${resource}?${stringify(query, {arrayFormat: 'bracket'})}`;
    return httpClient(url).then(({ json }) => ({ data: json }));
}

dataProvider.update = (resource, params) => {
    if ((resource !== 'proyectos' && resource !== 'curriculos') || !params.data.fichero) {
        return dataProvider.update(resource, params);
    }

    let formData = new FormData();
    for (const property in params.data) {
        formData.append(`${property}`, `${params.data[property]}`);
    }

    if(resource === 'curriculos'){
        formData.append('pdf_curriculo', params.data.attachments.rawFile)
    }
    else if(resource === 'proyectos'){
        formData.append('fichero', params.data.attachments.rawFile)
    }

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

export { dataProvider };
