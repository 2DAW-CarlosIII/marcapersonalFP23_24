import { usePage } from '@inertiajs/react'
import { useState } from 'react';
import {
    Confirm
} from 'react-admin';

//        <div className="flashMessage">{flash}</div>
//        <Confirm
//title="Empresa"
//content={flash}
//cancel={null}
// />

function FlashMessages() {
    const flash = usePage().props.flash;
    const [open, setOpen] = useState(true);
    const handleConfirm = () => {
        setOpen(false);
    };

    if(!flash) return null;
    return (

        <Confirm
            title="Empresa"
            content={flash}
            onConfirm={handleConfirm}
            onClose={() => setOpen(false)}
            cancel={null}
            isOpen={open}
            confirm="Aceptar"
        />
    );
  }

  export default FlashMessages;
