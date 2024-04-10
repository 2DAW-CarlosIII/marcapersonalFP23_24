// in resources/js/react_admin/authProvider.js

import { dataProvider } from "./dataProvider";

export const authProvider = {
    login: ({ username, password }) => {
        return dataProvider.postLogin( username, password )
        .then(response => {
            if (response.status < 200 || response.status >= 300) {
              throw new Error(response.statusText);
            }
        })
        .catch((e) => {
                throw new Error('Network error')
        });
    },
    logout: () => {
        return dataProvider.postLogout()
        .then(response => {
            if (response.status < 200 || response.status >= 300) {
              throw new Error(response.statusText);
            }
        })
        .catch((e) => {
                throw new Error('Network error')
        });
    },
    checkAuth: () =>{
        return dataProvider.getIdentity()
            .then(( data ) => {
                return data.json
            })
            .catch(() => {
                throw new Error('Unatuhenticated')
            });
    },
    checkError: (error) => {
        const status = error.status;
        if (status === 401 || status === 403) {
            return Promise.reject();
        }
        return Promise.resolve();
    },
    getIdentity: () => {
        return dataProvider.getIdentity()
            .then(( data ) => {
                data.json.avatar = '/storage/' + data.json.avatar
                return data.json
            })
            .catch(() => {
                throw new Error('Unatuhenticated')
            });
    },
    getPermissions: () => Promise.resolve('')
};
