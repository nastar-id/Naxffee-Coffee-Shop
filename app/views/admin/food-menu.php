
            <section id="menu" class="mt-4 pb-4">
                <div class="container-fluid">
                    <h2>Manage Food Menu</h2>

                    <div class="mt-5">
                        <div class="mb-2"><?php Flash::flash(); ?></div>
                        <button type="button" class="btn btn-primary mb-3" id="add" data-text="Menu" data-table="foodmenu" data-bs-toggle="modal" data-bs-target="#formModal">
                            Add Food
                        </button>
                        <div class="overflow-auto">
                            <table id="data" class="table table-striped table-hover mt-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Description</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data["foodmenu"] as $foodmenu): 
                                    $price = ($foodmenu["discount"] != 0) ? $foodmenu["price"] - ($foodmenu["price"] * $foodmenu["discount"] / 100) : $foodmenu["price"];
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td>
                                                <img src="<?= BASE_URL; ?>assets/uploads/<?= $foodmenu["image"]; ?>" class="img-fluid" width="35">
                                            </td>
                                            <td><?= $foodmenu["foodname"]; ?></td>
                                            <td>Rp. <?= $price; ?></td>
                                            <td><?= $foodmenu["discount"]; ?>%</td>
                                            <td><?= $foodmenu["description"]; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL; ?>admin/edit/<?= $foodmenu["id"]; ?>" class="btn btn-success btn-sm ms-1 edit" data-id="<?= $foodmenu["id"]; ?>" data-text="Menu" data-table="foodmenu" data-bs-toggle="modal" data-bs-target="#formModal"><i class="bi bi-pencil-square"></i></a>
                                                <a href="<?= BASE_URL; ?>admin/action/delete/food/<?= $foodmenu["id"]; ?>" onclick="return confirm('Delete <?= $foodmenu["foodname"]; ?>?')"><button type="button" class="btn btn-danger btn-sm ms-1"><i class="bi bi-trash"></i></button></a>
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
                    <form action="<?= BASE_URL; ?>admin/action/add/menu" method="POST" id="formMenu" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="table" id="table">
                        <div class="mb-3">
                            <label for="name" class="form-label">* Food Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-8">
                                    <label for="price" class="form-label">* Price</label>
                                    <div class="wrap">
                                        <span class="price-span">Rp.</span>
                                        <input type="text" name="price" class="form-control" id="price" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="discount" class="form-label">Discount</label>
                                    <div class="wrap">
                                        <span class="discount-span">%</span>
                                        <input type="text" name="discount" class="form-control" id="discount" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">* Description</label>
                            <textarea class="form-control" name="description" id="description" style="height: 100px" required></textarea>
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