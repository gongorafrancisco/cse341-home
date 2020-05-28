<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Add Scripture</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body class="d-flex flex-column h-100">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
    <main class="container-fluid my-5">
        <h1 class="display-4 text-center">Add Scripture</h1>
        
        <?php if (isset($message)) {echo $message;}?>

        <form class="col-6 my-5 mx-auto" action="../teamprojects/index.php" method="post">
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Book</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="book" name="book" aria-describedby="bookHelp" required>
                    <small id="booklHelp" class="form-text text-muted">e.g. 2 Nephi</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="chapter" class="col-sm-2 col-form-label">Chapter</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="chapter" name="chapter" aria-describedby="chapterHelp" min="1" required>
                    <small id="chapterHelp" class="form-text text-muted">e.g. 31</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="verse" class="col-sm-2 col-form-label">Verse</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="verse" name="verse" aria-describedby="verseHelp" min="1" required>
                    <small id="verseHelp" class="form-text text-muted">e.g. 20</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="content" name="content" required></textarea>
                </div>
            </div>

            <?php
            if (isset($topicsList)) {
                echo $topicsList;
            }
            ?>

            <div class="col-8 my-2 mx-auto p-0">
                <button type="submit" class="w-100 btn btn-primary">Submit</button>
                <input type="hidden" name="action" value="insertScripture">
            </div>

        </form>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</body>

</html>