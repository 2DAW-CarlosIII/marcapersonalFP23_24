import { usePage } from '@inertiajs/react'
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

    if(!flash) return null;
    return (

        <Confirm
            title="Empresa"
            content={flash}
            cancel={null}
        />
    );
  }

  export default FlashMessages;
