$(document).ready(function(){
   $(document).on("click", ".panel-title a", function(){
      let category = $(this).data("id");

      if(category != 0){
          $.ajax({
              url: "models/products/filter.php",
              method: 'get',
              dataType: 'json',
              data: {
                  id: category
              },
              success: function(data){
                  fillWithProducts(data);
              },
              error: function(xhr, status, responseText){
                  console.log(xhr);
              }
          });

      }else{
          $.ajax({
              url: "models/products/getAllProducts.php",
              method: 'get',
              dataType: 'json',
              success: function(data){
                  fillWithProducts(data);
              },
              error: function(xhr, status, responseText){
                  console.log(xhr);
              }

          });
      }
   });

   $(document).on("click", ".filterBtn", function(){
       let price_range = $('.price_range').val();
       $.ajax({
           type: 'post',
           url: 'models/products/filterPriceRange.php',
           dataType: 'json',
           data:{
               price_range: price_range
           },
           success: function(data) {
               fillWithProducts(data);
           },
           error: function(xhr,status,responseText){
               console.log(xhr);
           }
       });
   });

   function fillWithProducts(data){
        let prod = '';
        for(let d of data){
            prod += `
           <div class="col-sm-4">
                <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="${d.src}" alt="${d.alt}" />
                        <h2>$${d.cena}</h2>
                        <p>${d.nazivProizvod}</p>
                        <a href="index.php?page=product-info&id=${d.proizvod_id}" class="btn btn-info">More info</a><br/>
                        <a href="#" class="btn btn-default add-to-cart cart-bottom"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
                </div>
            </div>`;
        };
        $('#products').html(prod);
    }

//------VALIDATION FOR REGISTRATION

    $("#regBut").click(function(){
        let arrayError = [];

        let name = $("#nameId").val();
        let email = $("#emailId").val();
        let password = $("#passwordId").val();
        let username = $("#usernameId").val();

        let regexname= /^[A-Z]{1}[a-z]{2,20}$/;
        let regexusername = /^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/;
        let regexemail = /^[A-z\d]{2,}(\.?(\W\D)?[Az\d]{2,})*\@\w{2,}(\.\w{2,})(\.\w{2,})*$/;
        let regexpass = /([\w\W\D\d]){7,}/;

        if(!regexname.test(name) || name == ""){
            arrayError.push("There is something wrong with your name!");
        }

        if(!regexusername.test(username) || username == ""){
            arrayError.push("There is something wrong with your username!");
        }

        if(!regexemail.test(email) || email == ""){
            arrayError.push("There is something wrong with your email!");
        }

        if(!regexpass.test(password) || password == ""){
            arrayError.push("Your password has to be minimum 7 characters long!");
        }

        if(arrayError.length > 0){
            let html = "";
            for(let i = 0; i < arrayError.length; i++) {
                html += "<p class='text-danger'>" + arrayError[i] + "</p>";
            }
            $(".errorsReg").html(html);
            return false;
        }else{
            return true;
        }
    });

    $("#contactBtn").click(function(){
        let arrayError = [];

        let name = $("#nameContact").val();
        let email = $("#emailIContact").val();
        let subject = $("#subjectId").val();
        let message = $("#bodyId").val();

        let regexname= /^[A-Z]{1}[a-z]{2,20}$/;
        let regexemail = /^[A-z\d]{2,}(\.?(\W\D)?[Az\d]{2,})*\@\w{2,}(\.\w{2,})(\.\w{2,})*$/;
        let regexSubject = /^[A-z]{2,}(\s[A-z]{3,})*$/;
        let regexMessage = /^[A-z]{2,}(\W\D\d\s)*/;

        if(!regexname.test(name) || name == ""){
            arrayError.push("There is something wrong with your name!");
        }

        if(!regexemail.test(email) || email == ""){
            arrayError.push("There is something wrong with your email!");
        }

        if(!regexSubject.test(subject) || subject == ""){
            arrayError.push("There is something wrong with your subject!");
        }

        if(!regexMessage.test(message) || message == ""){
            arrayError.push("There is something wrong with your message!");
        }

        if(arrayError.length > 0){
            let html = "";
            for(let i = 0; i < arrayError.length; i++) {
                html += "<p class='text-danger'>" + arrayError[i] + "</p>";
            }
            $(".errorsContact").html(html);
            return false;
        }else{
            return true;
        }
    });

   $(".categories").hide();
   $(".users").hide();

    $(".categoriesClick").click(function(){
        $(".categories").show();
        $(".users").hide();
        $(".products").hide();
    });

    $(".usersClick").click(function(){
        $(".categories").hide();
        $(".users").show();
        $(".products").hide();
    });

    $(".productsClick").click(function(){
        $(".categories").hide();
        $(".users").hide();
        $(".products").show();
    });



//-------CRUD OVER USERS

    $(document).on("click", ".delete-user", function(e){
       e.preventDefault();
       let id = $(this).data('id');

       $.ajax({
          url: "models/admin/delete-user.php",
          method: "get",
          dataType: 'json',
          data:{
              id: id
          },
          success: function(data){
              refreshTable();
          },
          error: function(xhr,status,responseText){
              console.log(xhr);
          }
       });
    });

    $(document).on("click", ".change-user", function(e){
        let id = $(this).data('id');

         $.ajax({
            url: "models/admin/get-one.php",
            method: "get",
            dataType: "json",
            data:{
                id: id
            },
            success: function(data){
                fillForm(data);
            },
            error: function(xhr,status,responseText){
                console.log(xhr);
            }
         });
    });

    $(document).on("click", "#btnSave", function(){
       let id = $("#hdnId").val();

       if(id !== ""){
           $.ajax({
              url: "models/admin/change-user.php",
              method: "post",
              dataType: "json",
              data:{
                  id: id,
                  name: $("#name").val(),
                  username: $("#username").val(),
                  email: $("#email").val(),
                  password: $("#password").val(),
                  role: $("#roleOption").val()
              },
              success: function(data){
                  clearForm();
                  refreshTable();
              },
               error: function(xhr, status, responseText){
                   console.log(xhr);
               }
           });
       }else{
           $.ajax({
               url: 'models/admin/add-user.php',
               method: 'post',
               dataType: 'html',
               data: {
                   name: $("#name").val(),
                   username: $("#username").val(),
                   email: $("#email").val(),
                   password: $("#password").val(),
                   role: $("#roleOption option:selected").val()
               },
               success: function(data){
                   clearForm();
                   refreshTable();
               },
               error: function(xhr, status, responseText){
                   console.log(responseText);
               }
           })
       }
    });

    function fillForm(data){
        $("#hdnId").val(data.id_korisnik);
        $("#name").val(data.ime);
        $("#username").val(data.username);
        $("#email").val(data.email);
        $("#password").val(data.password);
        $("#roleOption").val(data.uloga_id);
        $("#form-heading").html("Update user");
    }

    function clearForm(){
        $("#hdnId").val("");
        $("#name").val("");
        $("#username").val("");
        $("#email").val("");
        $("#password").val("");
        $("#roleOption").val("0");
        $("#form-heading").html("Add user");
    }

    function refreshTable(){
        $.ajax({
            url: "models/admin/get-all.php",
            method: "get",
            dataType: "json",
            success: function(data){
                printUsers(data);
            },
            error: function(xhr, status, responseText){
                console.log(xhr);
            }
        });
    }

    function printUsers(users){
        let prod = '', count =  1;
        for(let user of users){
            prod += printUser(user, count);
            count++;
        }
        $("#contentUsers").html(prod);
    }

    function printUser(user, count){
        return `<tr>
                        <th>${count}</th>
                        <td>${user.ime}</td>
                        <td>${user.email}</td>
                        <td>${user.naziv}</td>
                        <td><a href="#" class="change-user" data-id="${user.id_korisnik}">Change</a></td>
                        <td><a href="#" class="delete-user" data-id="${user.id_korisnik}">Delete</a></td>
                    </tr>`;
    }

    //-------CRUD OVER CATEGORIES

    $(document).on("click", ".delete-cat", function(e){
        e.preventDefault();
        let id = $(this).data('id');

        $.ajax({
            url: "models/categories/delete-cat.php",
            method: "get",
            dataType: 'json',
            data:{
                id: id
            },
            success: function(data){
                refreshTableCat();
            },
            error: function(xhr,status,responseText){
                console.log(xhr);
            }
        });
    });

    $(document).on("click", ".change-cat", function(e){
        let id = $(this).data('id');

        $.ajax({
            url: "models/categories/get-one.php",
            method: "get",
            dataType: "json",
            data:{
                id: id
            },
            success: function(data){
                fillFormCat(data);
            },
            error: function(xhr,status,responseText){
                console.log(xhr);
            }
        });
    });

    $(document).on("click", "#btnSaveCat", function(){
        let id = $("#hdnIdCat").val();

        if(id !== ""){
            $.ajax({
                url: "models/categories/change-category.php",
                method: "post",
                dataType: "json",
                data:{
                    id: id,
                    name: $("#nameCat").val(),
                    href: $("#linkCat").val(),
                },
                success: function(){
                    clearFormCat();
                    refreshTableCat();
                },
                error: function(xhr, status, responseText){
                    console.log(xhr);
                }
            });
        }else{
            $.ajax({
                url: 'models/categories/add-category.php',
                method: 'post',
                dataType: 'html',
                data: {
                    name: $("#nameCat").val(),
                    href: $("#linkCat").val(),
                },
                success: function(){
                    clearFormCat();
                    refreshTableCat();
                },
                error: function(xhr, status, responseText){
                    console.log(responseText);
                }
            })
        }
    });

    function fillFormCat(data){
        $("#hdnIdCat").val(data.id_marka);
        $("#nameCat").val(data.naziv);
        $("#linkCat").val(data.putanja);
        $("#form-heading-cat").val("Update category")
    }

    function clearFormCat(){
        $("#hdnIdCat").val("");
        $("#nameCat").val("");
        $("#linkCat").val("");
        $("#form-heading-cat").val("Add category")
    }

    function refreshTableCat(){
        $.ajax({
            url: "models/categories/get-all.php",
            method: "get",
            dataType: "json",
            success: function(data){
                printCats(data);
            },
            error: function(xhr, status, responseText){
                console.log(xhr);
            }
        });
    }

    function printCats(cats){
        let prod = '', count =  1;
        for(let cat of cats){
            prod += printCat(cat, count);
            count++;
        }
        $("#contentCat").html(prod);
    }

    function printCat(cat, count){
        return `<tr>
                        <th>${count}</th>
                        <td>${cat.naziv}</td>
                        <td>${cat.putanja}</td>
                        <td><a href="#" class="change-cat" data-id="${cat.id_marka}">Change</a></td>
                        <td><a href="#" class="delete-cat" data-id="${cat.id_marka}">Delete</a></td>
                    </tr>`;
    }

    //-----CRUD OVER PRODUCTS

        $(document).on("click", ".delete-prod", function(e){
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                url: "models/products/delete-product.php",
                method: "get",
                dataType: 'json',
                data:{
                    id: id
                },
                success: function(){
                    refreshTableWithProducts();
                },
                error: function(xhr,status,responseText){
                    console.log(xhr);
                }
            });
        });

        $(document).on("click", ".change-prod", function(e){
            let id = $(this).data('id');

            $.ajax({
                url: "models/products/get-one.php",
                method: "get",
                dataType: "json",
                data:{
                    id: id
                },
                success: function(data){
                    fillFormWithProducts(data);
                },
                error: function(xhr,status,responseText){
                    console.log(xhr);
                }
            });
        });

        function fillFormWithProducts(data){
            $("#hdnIdProdChange").val(data.id_proizvod);
            $("#altProdChange").val(data.alt);
            $("#nameProdChange").val(data.nazivProizvod);
            $("#priceProdChange").val(data.cena);
            $("#roleOptionProdChange").val(data.marka_id);
        }

        function refreshTableWithProducts(){
            $.ajax({
                url: "models/products/get-all.php",
                method: "get",
                dataType: "json",
                success: function(data){
                    printProducts(data);
                },
                error: function(xhr, status, responseText){
                    console.log(xhr);
                }
            });
        }

        function printProducts(products){
            let prod = '', count =  1;
            for(let p of products){
                prod += printProd(p, count);
                count++;
            }
            $("#contentProd").html(prod);
        }

        function printProd(p, count){
            return `<tr>
                                <th>${count}</th>
                                <td><img src="${p.src}" alt="${p.alt}" width="60" height="110"/></td>
                                <td>${p.alt}</td>
                                <td>${p.nazivProizvod}</td>
                                <td>${p.cena}</td>
                                <td>${p.naziv}</td>
                                <td><a href="#" class="change-prod" data-id="${p.id_proizvod}" data-toggle="modal" data-target="#myModal">Change</a></td>
                                <td><a href="#" class="delete-prod" data-id="${p.id_proizvod}">Delete</a></td>
                            </tr>`;
        }
});