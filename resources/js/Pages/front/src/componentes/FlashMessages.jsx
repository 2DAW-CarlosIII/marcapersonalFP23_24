import { usePage } from '@inertiajs/react'

function FlashMessages() {
    const flash = usePage().props.flash;

    if(!flash) return null;
    return (
        <div className="flashMessage">{flash}</div>
    );
  }

  export default FlashMessages;
