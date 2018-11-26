<html>
<head>
    <title>template MVC</title>
    <base href="<?= BASE_URL ?>">
    <link href="./publico/css/app.css" rel="stylesheet" type="text/css" media="all" />
     <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href="./publico/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./publico/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./publico/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./publico/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./publico/css/font-awesome.css" rel="stylesheet">
        <meta charset="utf-8">
        <link href="./publico/css/bootstrap.min.css" rel="stylesheet">
        <link href="./publico/css/sb-admin-2.css" rel="stylesheet">
        <link rel="stylesheet" href="./publico/css/app.css">
        <link rel="stylesheet" href="./publico/css/flexslider.css" type="text/css" media="screen" />
</head>

<body>

    
    <?php require "visao/cabecalho.php"; ?>



    <?php alertComponentRender(); ?>

    <main class="container">
        <?php require $viewFilePath; ?>

    </main>
      <?php require "visao/rodape.php"; ?>
   

</body>
</html>
