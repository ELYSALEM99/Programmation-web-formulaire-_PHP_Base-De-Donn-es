<?php
class UserCls
{
    private string $login;
    private string $mail;
    private string $password;
    private string $nom;
    private string $prenom;
    private string $dateNaissance;
    private string $adresse;
    private string $url;
    private string $compte;
    private string $couleur;
    private string $animal;
    private string $lobby;
    private string $appName;
    private string $appCodeName;
    private string $product;
    private string $userAgent;
    private string $latitude;
    private string $longitude;
    private float $TempsConnexionMinute;


    public function __construct(array $args)
    {
        $this->login = $args['login'];
        $this->mail = $args['em'];
        $this->password = $args['pwd'];
        $this->nom = $args['nom'];
        $this->prenom = $args['prenom'];
        $this->dateNaissance = $args['date_naissance'];
        $this->adresse = $args['adresse'];
        $this->url = $args['url'];
        $this->compte = $args['compte'];
        $this->couleur = $args['couleur'];
        $this->animal = $args['animal'];
        $this->lobby = $args['lobby'];
        $this->appName = $args['appName'];
        $this->appCodeName = $args['appCodeName'];
        $this->product = $args['product'];
        $this->userAgent = $args['userAgent'];
        $this->latitude = $args['lat'];
        $this->longitude = $args['lon'];
        $this->TempsConnexionMinute = $args['TempsConnexionMinute'];
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function getLogin(): string
    {
        return $this->login;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function getMail(): string
    {
        return $this->mail;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }
    public function getDateNaissance(): string
    {
        return $this->dateNaissance;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function getAdresse(): string
    {
        return $this->adresse;
    }
    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function getUrl(): string
    {
        return $this->url;
    }
    public function setCompte($compte)
    {
        $this->compte = $compte;
    }
    public function getCompte(): string
    {
        return $this->compte;
    }
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
    public function getCouleur(): string
    {
        return $this->animal;
    }
    public function setAnimal($animal)
    {
        $this->animal = $animal;
    }
    public function getAnimal(): string
    {
        return $this->animal;
    }

    public function setLobby($lobby)
    {
        $this->lobby = $lobby;
    }
    public function getLobby(): string
    {
        return $this->lobby;
    }

    public function setAppName($appName)
    {
        $this->appName = $appName;
    }
    public function getAppName(): string
    {
        return $this->appName;
    }
    public function setAppCodeName($appCodeName)
    {
        $this->appCodeName = $appCodeName;
    }
    public function getAppCodeName(): string
    {
        return $this->appCodeName;
    }
    public function setProduct($product)
    {
        $this->product = $product;
    }
    public function getProduct(): string
    {
        return $this->product;
    }
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }
    public function getLatitude(): string
    {
        return $this->latitude;
    }
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
    public function getLongitudee(): string
    {
        return $this->longitude;
    }
    public function setTempsConnexionMinute($TempsConnexionMinute)
    {
        $this->TempsConnexionMinute = $TempsConnexionMinute;
    }
    public function getTempsConnexionMinute(): string
    {
        return $this->TempsConnexionMinute;
    }
    // public function __toString(): string
    // {
    //     return 'le login est : ' . $this->login;
    // }
    public function save_DB(): Bool
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $port = 8889;
        $message = "";
        $grettings = "Hello ";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=formulaire", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $message = "Connected successfully";
            //echo $message;
        } catch (PDOException $e) {
            $message = "Connection failed: " . $e->getMessage();
            //echo $message;
            return FALSE;
        }
        $req = $conn->prepare("INSERT into `utilisatuer` (`login`, mail, motPasse, nom, prenom, dateNaissance, adresse,
        urlSite, compteSociaux, couleurPreferee, animalCompagnie, lobb, appName, appCodeName, product, userAgent, 
        TempsConnexionMinute, lat, lon)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
        $req->execute(array($this->getLogin(), $this->getMail(), md5($this->getPassword()), $this->getNom(), 
                            $this->getPrenom(), $this->getDateNaissance(), $this->getAdresse(), $this->getUrl(),
                            $this->getCompte(), $this->getCouleur(), $this->getAnimal(), $this->getLobby(),
                            $this->getAppName(), $this->getAppCodeName(), $this->getProduct(), $this->getUserAgent(),
                            $this->getTempsConnexionMinute(), $this->getLatitude(), $this->getLongitudee()));
        $reponse2 = $req->fetch();
        // query
        return True;
    }
}
