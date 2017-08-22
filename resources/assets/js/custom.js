import EchoLibrary from "laravel-echo"

window.Echo = new EchoLibrary({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});

Echo.channel('reservation')
    .listen('ReservationPlace', (e) => {
    var d = document.getElementById(e.codeOfPlace);
    if(d){
        d.className = " green";
    }

    updCounters(e);
}).listen('PreReservation', (e) => {
    var d = document.getElementById(e.codeOfPlace);
    if(d){
        d.className = " blue";
    }
    updCounters(e);
});

function updCounters(e){
    var counterTotal = document.getElementById(e.matchId + ':freeTotal');
    if(counterTotal){
        var count = parseInt(counterTotal.innerHTML);
        counterTotal.innerHTML = count - 1 ;
    }
    var counterSection = document.getElementById(e.matchId + ':' + e.sectorId + ':freeInSector');
    if(counterSection){
        var count = parseInt(counterSection.innerHTML);
        counterSection.innerHTML = count - 1 ;
    }
}


