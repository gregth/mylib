var koko = { 
    lala: function( txt ) { alert( txt ); }, 
    lalala: function foo( txt ) { this.lala( txt ); }
};

//koko.lalala( "HEY" );
document.body.onclick = koko.lalala;

