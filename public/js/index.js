var loadedPost;
var totalPost;
let totalPage;
let page;
var postEnded = false;


//for loading animation 
var loadingAnimation = `<div id="loadingAnimation" class="loadingio-spinner-eclipse-f5f99z8brf4"><div class="ldio-rwa0xznz7l">
<div></div>
</div></div>`;

// for scroll 90% 
function isScrollAtBottom() {
    var scrollPosition = $(window).scrollTop();
    var windowHeight = $(window).height();
    var documentHeight = $(document).height();
    var scrollPercentage = (scrollPosition / (documentHeight - windowHeight)) * 100;
    return scrollPercentage >= 95;
}

function displayPost() {
    console.log("now post will be displayed")
    console.log('here' + totalPage + postEnded);

    if (page < totalPage) {
        console.log("page number " + page);

        $.ajax({
            url: 'get_post/' + page,
            type: 'GET',
            success: function (response) {
                // Replace the existing content with the loaded form
                console.log(response);
                $("#loadingAnimation").remove(); //to remove loading animatin when page is loaded
                $('.main-feed').append(response); // to add posts to main-feed


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading post', error);
            }
        });


    } else {

        $('.main-feed').append(loadingAnimation); // loading animation for newer posts

        $.ajax({
            url: 'get_post/last',
            type: 'GET',
            // async : false,
            success: function (response) {
                $("#loadingAnimation").remove(); //to remove loading animatin when page is loaded

                console.log(response);
                $('.main-feed').append(response);

            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading posts:', error);
            }
        });
    }

}

//for displaying post on feed
async function loadPost() {
    // console.log("new posts will be added");
    //loading will be started here CSS loading 
    console.log("loading... (css animation)")
    // adding loading animation 
    $('.main-feed').append(loadingAnimation);



    await $.ajax({
        url: 'totalPost',
        type: 'GET',
        success: function (response) {
            // Replace the existing content with the loaded form

            totalPost = response;
            console.log('total post on database = ' + totalPost);
            //         totalPage = Math.ceil(totalPost/10);
            // console.log('total page(s) = ' + totalPage);
        }
    });
    totalPage = Math.ceil(totalPost / 10);
    console.log('total page(s) = ' + totalPage);


    //for 
    displayPost();

}

$(document).ready(function () {

    // to load post from database asyncronously 
    page = 1; // initial page 
    loadPost();

    $(window).scroll(function () {
        // Check if the user has scrolled to 90% of the page
        if (isScrollAtBottom()) {
            // Call the loadPosts function when the user scrolls to 90% of the page
            if (page < totalPage) {
                ++page;
                console.log(page);
                console.log(totalPage);
                displayPost();
            }


        }
    });



    // for geting to post_form page (will be added to add post section on home page)
    $('.btn').click(function () {
        console.log("button is pressed");

        $.ajax({
            url: 'post_form',
            type: 'GET',
            success: function (response) {
                // Replace the existing content with the loaded form
                $('.content').html(response);
            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });
    })

    //! IMP discussion: As posts are added dynamically we cannot just add jquery to static DOM object
    //! we need to  need to use event delegation to ensure that the click event handler is attached to dynamically added elements
    // so following has to be done for every dynamically added element which want click function

    $(document).on('click', '.likeButton', function () {
        var postId = $(this).data('post-id');
        console.log('Like button clicked for post ' + postId);

        //now we are toggle like button 
        $(this).closest('.like-btn').toggleClass('active');
        var isActive = $(this).closest('.like-btn').hasClass('active');

        if (isActive) {
            // incrementing like count using parseInt inside html and adding 1
            $(this).siblings('.like-count').html(parseInt($(this).siblings('.like-count').html()) + 1);
        }
        else {
            // decrementing like count using parseInt inside html and sunbstractng by 1
            $(this).siblings('.like-count').html(parseInt($(this).siblings('.like-count').html()) - 1);
        }
    });

    $(document).on('click', '.commentButton', function () {
        var postId = $(this).data('post-id');
        console.log('comment button clicked for post ' + postId);
    });


    $('.search-input').keyup(function (event) {
        // Check if Enter key is pressed (key code 13)
        if (event.keyCode === 13) {
            // Perform search action
            console.log("searched for " + $('.search-input').val());
        }
    });

});



//post javasript section

$('.three-dots-menu').on('click', function () {
    $('.dropdown-menu').toggle();
});

// Like button toggle