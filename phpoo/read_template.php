<?php
// search form
echo "<form role='search' action='search.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
        echo "<input type='text' class='form-control' placeholder='pesquisar...' name='s' id='srch-term' required {$search_value} />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";
  
// create product button
echo "<div class='right-button-margin'>";
    echo "&nbsp;<a href='delete_product.php?s=all' class='btn btn-danger pull-right' id='removeall'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Excluir Selecionados";
    echo "</a>&nbsp;";
    echo "&nbsp;<a href='create_product.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-plus'></span> Novo Produto";
    echo "</a> &nbsp;";
echo "</div>";
  
// display the products if there are any
if($total_rows>0){
  
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th><input type=\"checkbox\" id=\"checkTodos\" name=\"checkTodos\"></th>";
            echo "<th>Product</th>";
            echo "<th>Price</th>";
            echo "<th>Description</th>";
            echo "<th>Category</th>";
            echo "<th>Actions</th>";
        echo "</tr>";
  
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  
            extract($row);
  
            echo "<tr>";
                echo "<td><input type=\"checkbox\" value={$id} name=\"chkexcluir\"></td>";
                echo "<td>{$name}</td>";
                echo "<td>{$price}</td>";
                echo "<td>{$description}</td>";
                echo "<td>";
                    $category->id = $category_id;
                    $category->readName();
                    echo $category->name;
                echo "</td>";
  
                echo "<td>";
  
                    // read product button
                    echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Read";
                    echo "</a>";
  
                    // edit product button
                    echo "<a href='update_product.php?id={$id}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</a>";
  
                    // delete product button
                    echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</a>";
  
                echo "</td>";
  
            echo "</tr>";
  
        }
  
    echo "</table>";
  
    // paging buttons
    include_once 'paging.php';
}
  
// tell the user there are no products
else{
    echo "<div class='alert alert-danger'>No products found.</div>";
}
?>