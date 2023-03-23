<?php
require_once("../../.core/index.php");
/** @var array $items
 * @var array $columns
 * @var string $table
 * @var string $title
 */

include("../../partials/doctype.php");
include("../../partials/header.php");

?>


<div class="wrapper ">
    <div class="container">
        <div class="d-flex justify-content-between p-4">
            <h1 class="text-white"><?= $title ?></h1>
            <a href="../../additionalPages/<?= $table ?>/" class="btn btn-primary m-3">Добавить</a>
        </div>
        <table class="table table-info table-striped table-hover ">
            <thead class="table-success fw-bold text-decoration-underline">
            <?php foreach ($columns as $column) : ?>
                <?php if (is_int(strpos($column, 'id_'))) : ?>
                    <td class="text-center "><?= $column ?></td>
                <?php else : ?>
                    <td class="text-center"><?= $column ?></td>
                <?php endif ?>
            <?php endforeach; ?>
            <th class="text-center" scope="col">Actions</th>
            </thead>
            <tbody>
            <?php foreach ($items as $item) : ?>
                <tr class="">
                    <?php foreach ($columns as $key => $column) : ?>
                        <?php if ($key == 0) : ?>
                            <td class="text-center id"><?= $item[$column] ?></td>
                        <?php else : ?>
                            <?php if (is_int(strpos($column, 'id_'))) : ?>
                                <td class="text-center">
                                    <a href=<?= '.?filter=' . $item['id_type'] ?>><?= $item['types_name'] ?></a>
                                </td>
                            <?php elseif (is_int(strpos($column, 'img_path'))) : ?>
                                <td class="text-center">
                                    <img class="w-25 object-fit-cover" style=""
                                         src="<?= '../../img/' . $item[$column] ?>"/>
                                </td>
                            <?php else : ?>
                                <td class="text-center"><?= $item[$column] ?></td>
                            <?php endif ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td class="text-center">
                        <form action="../../additionalPages/<?= $table ?>/" class="form m-1" method="GET">
                            <input type="number" class="d-none" name="item_id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-success">
                                Edit
                            </button>
                        </form>
                        <form method="POST" class="">
                            <button type="submit" value="<?= $item['id'] ?>"
                                    name="<?= isset($item['img_path']) ? 'item--delWithImg' : 'item--del' ?>"
                                    class="btn btn-danger form m-1">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/src/partials/footer.php'); ?>
