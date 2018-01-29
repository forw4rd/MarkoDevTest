document.addEventListener("DOMContentLoaded", function() {

    function KalkulatorController(model, viewm) {
        this.model = model;
        this.viewmodel = viewm;


        this.zabiljeziZnak=function(domZnak){

            this.model.dodajZnak(domZnak.textContent);
            var output=this.model.vratiUnos();
            this.viewmodel.ispisiRezultat(output);
        };

        this.resetirajKalk=function(){
            this.model.resetirajUnos();
            var output=this.model.vratiUnos();
            this.viewmodel.ispisiRezultat(output);
        };

        this.jednakoKalk=function(){
            this.model.izracunaj();
            var output=this.model.vratiUnos();
            this.viewmodel.ispisiRezultat(output);
        };

        this.run = function () {
            var znakovi = document.querySelectorAll(".znak");
            for(var i=0; i < znakovi.length; i++ ){
                (function(i){
                    znakovi[i].addEventListener("click", function (){
                    kalkulator.zabiljeziZnak(znakovi[i]);
                    });
                })(i);
            }
            var resetiraj= document.getElementById("KalkulatorBrisi");
            resetiraj.addEventListener("click", function (){
                kalkulator.resetirajKalk();
            });
            var izracunaj= document.getElementById("KalkulatorJednako");
            izracunaj.addEventListener("click", function (){
                kalkulator.jednakoKalk();
            });
        };


    };

    function KalkulatorModel() {
        this.rez = 0;
        this.unos="";

        this.dodajZnak=function(znak){
            var filtriranZnak=this.filtrirajRacunanje(znak);
            this.unos += filtriranZnak;
        };
        this.vratiUnos=function(){
            return this.unos;
        };

        this.resetirajUnos=function(){
            this.unos = "";
        };

        this.filtrirajRacunanje=function(znak){
            var nedopusteni=['+', '-', '*', '/'];
            if(this.unos.length==0){
                if(this.uNedopustenima(znak)==1){
                    return "";
                }
                return znak;
            }else{
                if(this.uNedopustenima(this.unos[(this.unos.length-1)])==1 && this.uNedopustenima(znak)==1){
                    this.unos=this.unos.substr(0,this.unos.length-1);
                }
                return znak;
            }
        };

        this.uNedopustenima=function(znak){
            var nedopusteni=['+', '-', '*', '/'];
            var unutra=0;
            for(var i=0;i<nedopusteni.length;i++){
                if(nedopusteni[i]==znak && unutra==0){
                    unutra=1;
                }

            }
            return unutra;
        };

        this.izracunaj=function(){

            if(this.unos.length) {
                if (this.uNedopustenima(this.unos[(this.unos.length - 1)])) {
                    this.unos = this.unos.substr(0, this.unos.length - 1);
                }

            this.unos=eval(this.unos);
            }
        };


    };


    function KalkulatorView() {

        this.rezultatdom=document.getElementById("KalkulatorRezultat");

        this.ispisiRezultat = function (rezultat) {
            if(rezultat==="") {
               rezultat="Obrisano";
            }
            this.rezultatdom.textContent=rezultat;
        };

    };


    kalkView= new KalkulatorView();
    kalkModel= new KalkulatorModel();
    kalkulator= new KalkulatorController(kalkModel,kalkView);
    kalkulator.run();
});