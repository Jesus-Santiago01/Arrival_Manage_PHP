function app(){
    const convertiraBase64=(archivos)=>{
        Array.from(archivos).forEach(archivo=>{
            var reader=new FileReader();
            reader.readAsDataURL(archivo);
            reader.onload=function(){
                var base = reader.result;
                console.log(base64);
            }
        })
    }

    return(
        <div className="app">
        <input type="file" multiple onChange={(e)=>convertiraBase64(e.target.files)}/>
        </div>
    );

    }
    export default app;
    