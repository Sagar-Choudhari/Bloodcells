<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Pictures</title>
    <?php include('include/common_links.php'); ?>

    <link rel="stylesheet" href="css/request.css">
    <!-- <link rel="stylesheet" href="css/ionicons.min.css"> -->
    <!-- <link rel="stylesheet" href="css/ionic.min.css"> -->

    <!-- Core CSS file -->
<link rel="stylesheet" href="PhotoSwipe-4.1.3/dist/photoswipe.css"> 

<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
     In the folder of skin CSS file there are also:
     - .png and .svg icons sprite, 
     - preloader.gif (for browsers that do not support CSS animations) -->
 <link rel="stylesheet" href="PhotoSwipe-4.1.3/dist/default-skin/default-skin.css"> 
 

<!-- Core JS file -->
<script src="PhotoSwipe-4.1.3/dist/photoswipe.min.js"></script> 

<!-- UI JS file -->
<script src="PhotoSwipe-4.1.3/dist/photoswipe-ui-default.min.js"></script>




  </head>
  <body id="page-top">

    <!--  Navigation bar -->
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand text-uppercase font-weight-bold" id="logo-name"href="index.php"><img src="assets/Component.png" id="logo1" alt="component">Bloodcells</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav ml-auto font-weight-normal">
                <li class="nav-item active"> <a class="nav-link navigation-icon" href="index.php">Home</a> </li>
                <li class="nav-item"> <a class="nav-link navigation-icon" href="register.php">Register</a> </li>
                <li class="nav-item"> <a class="nav-link navigation-icon active" href="all_request.php">Request</a> </li>
                
                <li class="nav-item"> <a class="nav-link navigation-icon" href="camps.php">Activity</a> </li>
                <li class="nav-item"> <a class="nav-link navigation-icon" href="contact.php">Contact Us</a> </li>
                <li class="nav-item"> <a class="nav-link navigation-icon" href="about.php">About Us</a> </li>
                
<?php if (!isset($_SESSION['email'])): ?> 

    <li class="nav-item ml-5"> <a class="nav-link" href="login.php"><h6 class="login-button">Log-in</h6></a> </li>

<?php else: ?>

<?php $email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error); 
$arrayy = $user->fetch_assoc();

// SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'

?>
 <!-- <?php// echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?> -->

         <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow ml-5 border-right border-left rounded-pill border-white px-3">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-capitalize text-white"><?php echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?></span>
                <img class="img-profile rounded-circle" src="assets/Icon-person@2x.png" data-size="60x60"><img src="assets/ellipsis-v-solid.svg" class="ml-1 opacity-1" style="opacity: 0.5;" alt=""  width="6">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item disabled" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
                  

<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you really want to logout??</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="dataconn/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

            </li><?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>

      <!-- end  Navigation bar -->

<div class="container">

<label for="images" class="font-weight-normal text-primary py-4 h5 text-center m-auto d-block">Recents Events & Campaigns Activity Pictures</label>


<div id="main">

<?php 

 $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
 $result = $mysqli->query("SELECT * FROM upload_img order by id DESC") or die($mysqli->error);

 while($row = $result->fetch_assoc()): 

?>
  <div class="box" >
    <div class="pic" data-aos="fade-up">

<?php 
$loc = 'admin/upload_assets/'.$row['image'];

list($width,$height) = getimagesize($loc); 
 ?>

  <div class="my-gallery">

    <figure>
      <a href="admin/upload_assets/<?php echo $row['image']; ?>" data-size="<?php echo $width."x".$height; ?>" width="1024" height="auto">
          <img src="admin/upload_assets/<?php echo $row['image']; ?>" class="rounded shadow-sm myImgg imgdisplay image" itemprop="thumbnail" alt="Image description" />
      </a>
         <figcaption itemprop="caption description"><?php echo $row['title']; ?></figcaption>
                                          
    </figure>

  </div>

    </div>
  </div>

 <?php endwhile; ?>

  <!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
    <div class="cl"></div>
</div>

</div>



<script>
var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes 
            if(figureEl.nodeType !== 1) {
                continue;
            }

            linkEl = figureEl.children[0]; // <a> element

            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
            };



            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
            }

            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            } 

            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }

        return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
            return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) { 
                continue; 
            }

            if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};

        if(hash.length < 5) {
            return params;
        }

        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');  
            if(pair.length < 2) {
                continue;
            }           
            params[pair[0]] = pair[1];
        }

        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }

        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect(); 

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
            if(options.galleryPIDs) {
                // parse real index when custom PIDs are used 
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                    if(items[j].pid == index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
            return;
        }

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
    }
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery');

</script>

<div class="container">
        <?php include 'include/footer.php'; ?>
</div>
        <!-- scripts -->
    </div>
        <?php include('include/scripts.php'); ?>


<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>
      </body>
    </html>