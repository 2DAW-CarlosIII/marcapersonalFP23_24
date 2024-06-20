import React from 'react';
import useDropUpDown from '../hooks/useDropUpDown';

function DropDownComponent({ message, children }) {
  const dropArrowC = useDropUpDown();
  return (
    <>
      <p style={{color:'#F59432', fontSize:20}}>
        { message }
        <img onClick={dropArrowC.desplegarLista} id="dropdown" src={dropArrowC.dropImgSrc} width="30" alt=""></img>
      </p>
      {dropArrowC.dropImg ? children : <p></p>}
    </>
  );
}

export default DropDownComponent;
