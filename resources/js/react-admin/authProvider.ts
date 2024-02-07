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
        .then(() => {return `${import.meta.env.VITE_JSON_SERVER_URL}/../../`})
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
                throw new Error('Network error')
            });
    },
    checkError: (error) => {
        return Promise.resolve();
    },
    getIdentity: () => {
        return dataProvider.getIdentity()
            .then(( data ) => {

                if (data.json.avatar) {
                    data.json.avatar = data.json.attachments.src;

                } else {
                    data.json.avatar = 'http://acreditacion.educadgo.gob.mx/static/img/user.png';

                }

                return data.json
            })
            .catch(() => {
                throw new Error('Network error')
            });
    },
    getPermissions: () => Promise.resolve('')
};
