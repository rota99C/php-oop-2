<!-- Provate ad immaginare quali sono le classi necessarie per creare uno shop online; ad esempio, 
ci saranno sicuramente dei prodotti da acquistare e degli utenti che fanno shopping. Strutturare le classi 
gestendo l'ereditarietà dove necessario; ad esempio ci potrebbero essere degli utenti premium che hanno diritto 
a degli sconti esclusivi, oppure diverse tipologie di prodotti. Provate a far interagire tra di loro gli oggetti: 
ad esempio, l'utente dello shop  inserisce una carta di credito... -->


<?php
/* ci saranno sicuramente dei PRODOTTI da acquistare */
class Prodotto {
    public $categoria;
    public $prezzo;
    public $marca;
    public $disponibilità;
    public $descrizione;

    function __construct(string $categoria, float $prezzo, string $marca, bool $disponibilità, string $descrizione)
    {
        $this->categoria = $categoria;
        $this->prezzo = $prezzo;
        $this->marca = $marca;
        $this->disponibilità = $disponibilità;
        $this->descrizione = $descrizione;
    }

}

/* oggetti della classe Prodotto */
$maglietta = new Prodotto("vestiti", "42", "Dior","true", "Bella e costosa, per pochi");

/* e degli UTENTI che fanno shopping. */

class Utente {
    public $nome;
    public $cognome;
    public $email;
    public $indirizzo;
    public $metodoDiPagamento;

    function __construct($nome, $cognome, $email, $indirizzo, $metodoDiPagamento)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->indirizzo = $indirizzo;
        $this->metodoDiPagamento = $metodoDiPagamento;
    }
} 


/* ad esempio ci potrebbero essere degli UTENTI PREMIUM */

class UtentePremium extends Utente {

/* che hanno diritto a degli sconti esclusivi */

public $scontoEsclusivo = 10;
public $prezzoEsclusivo;

    function __construct($nome, $cognome, $email, $indirizzo, $metodoDiPagamento)
    {
        parent::__construct($nome, $cognome, $email, $indirizzo, $metodoDiPagamento);
    }

public function getPrezzoEsclusivo($prezzoProdotto) {
    return $this->prezzoEsclusivo = $prezzoProdotto - $this->scontoEsclusivo;
}

}

/* oggetto della classe Utente Premium */

$Gino = new UtentePremium("Gino", "Fumagalli", "ginof@gmail.com", "Via Montenapoleone - MI", "Credit Card");

/* Gino, utente premium, acquista la maglietta di Dior ottenendo uno sconto esclusivo di 10 euro */

$prezzoGino = $Gino->getPrezzoEsclusivo($maglietta->prezzo);

var_dump($prezzoGino);
