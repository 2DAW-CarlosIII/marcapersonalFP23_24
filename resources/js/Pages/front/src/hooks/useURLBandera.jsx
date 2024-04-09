import banderas from "../mocks/mock-banderas";

const useURLBandera = (codigoPais) => {

    let url;

    if (banderas[codigoPais.toUpperCase()] === undefined)
        url = banderas["SB"].url;
    else   url = banderas[codigoPais.toUpperCase()].url;

    return (url);

}

export default useURLBandera;
