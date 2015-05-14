<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Directorio corporativo</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">        
        <!-- Style -->
        <link href="css/style.css" rel="stylesheet">
        <!-- font awesome -->
         <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- navbar center -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand navbar-brand-centered">
                        <a href="http://dirmorzan.hol.es/">Morzan</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>        
        <!-- end navbar -->
        
        <?php 

            if(!empty($_GET)): 
                
                include('core/data.php'); 
            
                if(empty($rowPersonal)): 
                
                    include('views/empty.php');
            
                else:
            
                    include('views/personal.php');
            
                endif;
        
            else:

                include('views/home.php');

            endif;
                
        ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Include all compiled plugins the bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Include typeahead -->
        <!--script src="js/typeahead.js"></script-->
        <!--script src="js/data.js"></script-->
        <!-- underscore lib -->
        <script src="js/underscore.js"></script>
        <!-- app -->
        <script src="js/app.js"></script>
        <!-- Error image -->
        <script>
            $('img').error(function(){
                $(this).attr('src', 'img/x.png');
            });
        </script>        
        <!-- Consume json -->
        <script type="text/javascript">
        $(function(){

            var bondObjs = {};
            var bondNames = [];

            //get the data to populate the typeahead (plus an id value)
            var throttledRequest = _.debounce(function(query, process){

                //get the data to populate the typeahead (plus an id value)
                $.ajax({
                    url: 'js/bonds.json',
                    cache: false,
                    success: function(data){

                        //reset these containers every time the user searches
                        //because we're potentially getting entirely different results from the api
                        bondObjs = {};
                        bondNames = [];

                        //Using underscore.js for a functional approach at looping over the returned data.
                        _.each( data, function(item, ix, list){

                            //add the label to the display array
                            bondNames.push( item.name );

                            //also store a hashmap so that when bootstrap gives us the selected
                            //name we can map that back to an id value
                            bondObjs[ item.name ] = item;
                        });

                        //send the array of results to bootstrap for display
                        process( bondNames );
                    }
                });
            }, 300);

            $(".typeahead").typeahead({

                source: function ( query, process ) {

                    throttledRequest( query, process );

                }, highlighter: function( item ){

                    var bond = bondObjs[ item ];

                    return '<div class="bond">' + '<img src="' + bond.photo + '" />' + '<br/><strong>' + bond.name + '</strong>' + '</div>';

                }, updater: function ( selectedName ) {

                    //save the id value into the hidden field
                    $( "#bondId" ).val( bondObjs[ selectedName ].id );

                    //redirect to profile
                    $(location).attr('href', bondObjs[ selectedName ].value);

                    //return the string you want to go into the textbox (the name)
                    return selectedName;
                }
            });
        });
        </script>
    </body>
</html>