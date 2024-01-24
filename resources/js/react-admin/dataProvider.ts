import exp from 'constants';
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

export { dataProvider };
