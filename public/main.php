<html>

<head>
    <style>
        .two-columns-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* columns */
        .two-columns-grid>* {
            padding: 1rem;
        }
    </style>
</head>

<body>
    <div class="two-columns-grid">
        <div><?php include('index.html'); ?></div>
        <div><?php include('index.html'); ?></div>
    </div>
</body>

</html>