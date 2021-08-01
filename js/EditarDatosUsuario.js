new Vue({
    el:'#app',
    data:{
        url: "http://localhost/BECMarket/",
        nombre: '',
        apellidos: '',
        direccion: '',
        telefono: '',
        session_id: ''
    },
    methods:{
        editar: async function(){
            var form = new FormData();
            this.session_id = document.getElementById('session_id').value;
            //datos
            form.append("nombre",this.nombre);
            form.append("apellidos",this.apellidos);
            form.append("direccion",this.direccion);
            form.append("telefono",this.telefono);
            form.append("session",this.session_id);
            try {
                var rec = 'controladores/EditarDatosUsuario.php';
                const res = await fetch(this.url+rec,{
                    method: 'post',
                    body: form,
                });
                const resp = await res.text();
                console.log(resp);
                location.reload();
            } catch (error) {
                console.log(error);
            }
        }
        
    },
    created(){

    }
});