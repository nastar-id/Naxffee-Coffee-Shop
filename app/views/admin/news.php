
            <section id="menu" class="mt-4 pb-4">
                <div class="container-fluid">
                    <h2>Manage News</h2>

                    <div class="mt-5">
                        <div class="mb-2"><?php Flash::flash(); ?></div>
                        <button type="button" class="btn btn-primary mb-3" id="add" data-text="News" data-bs-toggle="modal" data-bs-target="#formModal">
                            Add News
                        </button>

                        <div class="overflow-auto">
                            <table id="data" class="table table-striped table-hover mt-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>News</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data["news"] as $news):
                                    $news_content = (strlen($news["news"]) > 45) ? substr($news["news"], 0, 45)."..." : $news["news"];
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td>
                                                <img src="<?= BASE_URL; ?>assets/uploads/<?= $news["image"]; ?>" class="img-fluid" width="35">
                                            </td>
                                            <td><?= $news["title"]; ?></td>
                                            <td><?= $news_content; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL; ?>admin/edit/<?= $news["id"]; ?>" class="btn btn-success btn-sm ms-1 edit" data-id="<?= $news["id"]; ?>" data-text="News" data-table="news" data-bs-toggle="modal" data-bs-target="#formModal"><i class="bi bi-pencil-square"></i></a>
                                                <a href="<?= BASE_URL; ?>admin/action/delete/news/<?= $news["id"]; ?>" onclick="return confirm('Delete <?= $news["title"]; ?>?')"><button type="button" class="btn btn-danger btn-sm ms-1"><i class="bi bi-trash"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="formModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASE_URL; ?>admin/action/add/news" method="POST" id="formMenu" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="table" id="table">
                        <div class="mb-3">
                            <label for="title" class="form-label">* Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="news" class="form-label">* News</label>
                            <textarea class="form-control" name="news" id="news" style="height: 100px" required></textarea>
                        </div>
                        <div class="mb-3" id="thumb"></div>
                        <div class="mb-3">
                            <label for="image" class="form-label">* Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"></button>
                </div>
                </form>
            </div>
        </div>
    </div>