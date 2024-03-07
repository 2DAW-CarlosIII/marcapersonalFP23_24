
import './BotonLanding.css'

const BotonLanding = (proprs) => {

    return (

                <div className="cardLP" >
                    <img src={proprs.sourceImg} width="450" height="400"  className="imagen img-fluid mx-auto d-block img-thumbnail"  alt={proprs.titulo}/> 
                    <div className="cardLP__content">
                        <p className="cardLP__title">{proprs.titulo}</p>
                    </div>
                </div>


    )
}
export default BotonLanding;