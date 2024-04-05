var loadedPost;
var totalPost;
let totalPage;
let page;
var postEnded = false;
var storyData;
var currentStoryNumber = 0;
var LatestStoriesArray = [];
var userId;// for storeis section 
var positionInLatestStoriesArray;


var removedVerifier = [];
var addedVerifier = [];

//for loading animation 
var loadingAnimation = `<div id="loadingAnimation" class="loadingio-spinner-eclipse-f5f99z8brf4"><div class="ldio-rwa0xznz7l">
<div></div></div></div>`;
var addStorySection = `<div class="add-story-section">
<i class="fa-solid fa-plus"></i>
<p>Add to story</p>
</div>`

//TODO--------------------------- ✔ ✔ ✔ PRE MADE FUNCTIONS SECTION START✔ ✔ ✔ -------------------------------------------

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
                // console.log(response);
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

                // console.log(response);
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

//function for getting stories data by user_id
function getStoriesInfo(userId) {
    $.ajax({
        url: "getStoriesOfUser/" + userId,
        type: 'GET',
        async: false,
        dataType: 'json',
        success: function (response) {

            storyData = response;

        },
        error: function (error) {
            // Handle errors, e.g., show an error message to the user
            console.error('Error loading posts:', error);
        }
    });
}

function storiesReplacment() {

    $('.story-user-info img').attr("src", 'uploads/image/' + storyData.userInfo.profile_dp)
    $('.story-user-info p').html(storyData.userInfo.fname + ' ' + storyData.userInfo.lname);
    $('#story-media').attr("src", 'uploads/stories/image/' + storyData.stories[0]["media"]);
    $(".progress-bar-section").empty();
    for (var i = 0; i < storyData.stories.length; i++) {
        $(".progress-bar-section").append('<div class="progress-bar bar-' + i + '"></div>')
    }
}
async function homeContent() {

    $('.center-content').append('<div class="stories-section"></div>');
    $('.center-content').append('<div class="main-feed"></div>');

    // adding verification task to right sidebar
    $('.verification-section').empty();
    $('.verification-section').append(loadingAnimation);



    $.ajax({
        url: 'get_verification_task',
        type: 'GET',

        success: function (response) {
            $(".verification-section #loadingAnimation").remove(); //to remove loading animatin when page is loaded

            $('.verification-section').append(response);

        },
        error: function (error) {
            // Handle errors, e.g., show an error message to the user
            console.error('Error loading form:', error);
        }
    });



    $('.stories-section').append(addStorySection);
    // to load post from database asyncronously 
    page = 1; // initial page 
    // $('.center-content').empty();

    loadPost();

    // AJAX fun for getting latest stories array which have user_id
    $.ajax({
        url: 'latestStoriesArray',
        type: 'GET',
        // async : false,
        dataType: 'json',
        success: function (response) {
            // $("#loadingAnimation").remove(); //to remove loading animatin when page is loaded

            // console.log(response)
            for (var i = 0; i < response.latestStories.length; i++) {

                // console.log(response.latestStories[i].user_id);
                LatestStoriesArray[i] = (response.latestStories[i].user_id);
            }
            // console.log(LatestStoriesArray)

            // console.log(LatestStoriesArray);

        },
        error: function (error) {
            // Handle errors, e.g., show an error message to the user
            console.error('Error loading posts:', error);
        }
    });

    // this will append new stories in story section 
    //stories loading section
    await $.ajax({
        url: 'latestStories',
        type: 'GET',
        // async : false,
        success: function (response) {
            // $("#loadingAnimation").remove(); //to remove loading animatin when page is loaded

            console.log(response);
            $('.stories-section').append(response);

        },
        error: function (error) {
            // Handle errors, e.g., show an error message to the user
            console.error('Error loading posts:', error);
        }
    });
}

// for scroll 90% 
$(window).scroll(function () {
    // Check if the user has scrolled to 90% of the page
    if (isScrollAtBottom()) {

        // this if condition will check if current page have .main-class or not
        if ($('.main-feed')[0]) {

            // Call the loadPosts function when the user scrolls to 90% of the page
            if (page < totalPage) {
                ++page;
                console.log(page);
                console.log(totalPage);
                displayPost();
            }


        }

    }
});

//function for get user's profile
function getProfileOfUserId(userId) {
    $('.center-content').empty();
    $('.center-content').append(loadingAnimation);

    // gets users's profile wala section
    $.ajax({
        url: 'user_profile/' + userId,
        type: 'GET',
        async: 'true',
        success: function (response) {
            // Replace the existing content with the loaded form
            // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
            $("#loadingAnimation").remove(); //to remove loading animatin when page is loaded

            $('.center-content').append(response);


        },
        error: function (error) {
            // Handle errors, e.g., show an error message to the user
            console.error('Error loading form:', error);
        }
    });

    // gets post of that particular users
    $.ajax({
        url: 'get_post_of_user_id/' + userId,
        type: 'GET',
        data: 'html',
        async: 'true',
        success: function (response) {
            // Replace the existing content with the loaded form
            // $('.center-content').find('*').not('.stories-section, .main-feed').remove();

            console.log((response));
            $('.center-content').append(response);



        },
        error: function (error) {
            // Handle errors, e.g., show an error message to the user
            console.error('Error loading form:', error);
        }
    });
}

// will add entey in habit_verification table and update status in verification_tasks table
function verificationDone(habitId, sentTime, status) {

    $.ajax({
        url: 'verfication_done/' + habitId + '/' + sentTime + '/' + status,
        type: 'GET',
        async: false,
        success: function (response) {
            console.log("Task updated\n Habit ID: " + habitId + "\nsent time: " + sentTime + "\nStatus: " + status)

        },
        error: function (error) {
            // Handle errors, e.g., show an error message to the user
            console.error('Error updating task', error);
        }
    });

}



//TODO--------------------------- ❌❌❌ PRE MADE FUNCTIONS SECTION END ❌❌❌ -------------------------------------------


$(document).ready(function () {


    homeContent();      //it will load main content in home
    //stories dialog box click event
    $(document).on('click', '.story-container', function () {
        console.log("story is pressed");
        userId = $(this).data('user-id');
        console.log("story of user with userId : " + userId);

        getStoriesInfo(userId); // function which get story info of current user i.e storyData

        //!IDFK why indexOf() is not working so i came up this for loop (back to basic)
        for (var i = 0; i < LatestStoriesArray.length; i++) {
            if (LatestStoriesArray[i] == userId)
                positionInLatestStoriesArray = i;
        }


        //displaying layout of story dialog box
        $.ajax({
            url: 'storyDialogBox',
            type: 'GET',
            async: false,
            success: function (response) {
                // $("#loadingAnimation").remove(); //to remove loading animatin when page is loaded

                // console.log(response);
                $('.stories-section').append(response);
                $('.story-user-info img').attr("src", 'uploads/image/' + storyData.userInfo.profile_dp)
                $('.story-user-info p').html(storyData.userInfo.fname + ' ' + storyData.userInfo.lname);
                $('#story-media').attr("src", 'uploads/stories/image/' + storyData.stories[0]["media"]);
                for (var i = 0; i < storyData.stories.length; i++) {
                    $(".progress-bar-section").append('<div class="progress-bar bar-' + i + '"></div>')
                }

            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading posts:', error);
            }
        });

    })


    $(document).on('click', '.story-right-click', function () {
        console.log(storyData);
        console.log('len of story' + storyData.stories.length)
        if (currentStoryNumber < storyData.stories.length - 1) {
            currentStoryNumber++;
            $('#story-media').attr("src", 'uploads/stories/image/' + storyData.stories[currentStoryNumber]["media"]);

            console.log(currentStoryNumber)
            // console.log(currentStoryNumber - 1 + ' this is bar no')
            // console.log(".progress-bar-section bar-" + (currentStoryNumber - 1))

            //! for selelcting two of same attr we have user . operator after , commma
            $(".progress-bar-section, .bar-" + (currentStoryNumber - 1)).addClass(' active');

        }
        else {
            // console.log("story khatam r")
            // console.log(currentStoryNumber)
            console.log('current position before increment ' + positionInLatestStoriesArray)
            console.log('length of array ' + LatestStoriesArray.length)

            positionInLatestStoriesArray++;
            console.log('current position after increment ' + positionInLatestStoriesArray)

            if (positionInLatestStoriesArray < LatestStoriesArray.length) {
                console.log(LatestStoriesArray[positionInLatestStoriesArray]);
                currentStoryNumber = 0;

                getStoriesInfo(LatestStoriesArray[positionInLatestStoriesArray]);
                storiesReplacment();

            }
            else {
                console.log('this story end and next story should begin')
                $('#story-dialog').remove();
                currentStoryNumber = 0;
            }

        }

    })

    $(document).on('click', '.story-left-click', function () {

        if (currentStoryNumber > 0) {
            currentStoryNumber--;
            $('#story-media').attr("src", 'uploads/stories/image/' + storyData.stories[currentStoryNumber]["media"]);
            $(".progress-bar-section, .bar-" + (currentStoryNumber)).removeClass(' active');

            console.log("C S " + currentStoryNumber)
        }
        else {
            currentStoryNumber = 0;
            positionInLatestStoriesArray--;
            if (positionInLatestStoriesArray >= 0) {
                currentStoryNumber = 0;

                getStoriesInfo(LatestStoriesArray[positionInLatestStoriesArray]);
                storiesReplacment();

            }
            else {
                $('#story-dialog').remove();
                currentStoryNumber = 0;
                positionInLatestStoriesArray = 0;
            }


        }

    })

    //* -----------Button and Div Click Section-----------------

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

    //habit button dynamically load users habits 
    $('.habit-btn').click(function () {
        console.log("habit button is pressed");
        $('.center-content').empty();


        $.ajax({
            url: 'habit',
            type: 'GET',
            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();

                $('.center-content').append(response);


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });



    })

    //home button on left sidebar to dynamically load home page
    $('.home-btn').click(function () {
        $('.center-content').empty();
        // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
        homeContent();
    })

    // View-profile click event inside user-menu 
    $('.view-profile').click(function () {
        console.log("view profile button is clicked");
        // to get user_id in order to sent it backend API
        // I have set data attribute to this element
        // so we get user_id easily by
        var userId = $(this).data('user-id');

        getProfileOfUserId(userId);

    })





    //todo---------------------DYNAMICALLY ADDED BUTTON LOGIC---------------------



    //! IMP discussion: As posts are added dynamically we cannot just add jquery to static DOM object
    //! we need to  need to use event delegation to ensure that the click event handler is attached to dynamically added elements
    // so following has to be done for every dynamically added element which want click function


    //followers button click event
    $(document).on('click', '.user-profile-follower-count', function () {

        // to get user_id in order to sent it backend API
        // I have set data attribute to this element
        // so we get user_id easily by
        var userId = $(this).data('user-id');

        console.log("followers btn is clicked");
        $('.center-content').empty();
        $('.center-content').append(loadingAnimation);


        $.ajax({
            url: 'find_followers_of_User/' + userId,
            type: 'GET',

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $("#loadingAnimation").remove(); //to remove loading animatin when page is loaded
                $('.center-content').append(response);


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });


    })
    // following btn click event
    $(document).on('click', '.user-profile-following-count', function () {

        // to get user_id in order to sent it backend API
        // I have set data attribute to this element
        // so we get user_id easily by
        var userId = $(this).data('user-id');

        console.log("followers btn is clicked");
        $('.center-content').empty();
        $('.center-content').append(loadingAnimation);


        $.ajax({
            url: 'find_followings_of_User/' + userId,
            type: 'GET',

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $("#loadingAnimation").remove(); //to remove loading animatin when content is loaded
                $('.center-content').append(response);


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });


    })

    // to get to user's profile 
    $(document).on('click', '#user-block-element', function () {
        var userId = $(this).data('user-id');
        console.log(userId);
        getProfileOfUserId(userId);
    });
    $(document).on('click', '.follower-following-back-icon', function () {
        var userId = $(this).data('user-id');
        console.log(userId);
        getProfileOfUserId(userId);
    });

    // close the post form
    $(document).on('click', '.dialog-box-close-btn', function () {
        $('.dialog-box-bg').remove();
    });


    // load post from when icon in navbar is clicked
    $(document).on('click', '.add-post-btn', function () {

        $.ajax({
            url: 'post_form',
            type: 'GET',

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $('.center-content').append(response);


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });

    });

    // explicitly post the form to backend API without need to reload site
    $(document).on('click', '.submit-post-btn', function () {

        var formData = new FormData($('#post-form')[0]);
        // You can append additional form data here if needed

        // AJAX request to submit form data
        $.ajax({
            url: 'submit_post',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle successful response here if needed
                console.log('Form submitted successfully');
                $('.dialog-box-bg').remove();

            },
            error: function (xhr, status, error) {
                // Handle error response here if needed
                console.error('Form submission error:', error);
            }
        });
    });

    //*---------------- Habit and Verification section------------------

    // verification section

    $(document).on('click', '.verifier-btn', function () {
        console.log("verifier btn pressed");
        removedVerifier = [];
        addedVerifier = [];

        // this ajax request will get verifier block from backend API just empty block
        $.ajax({
            url: 'verifier_dialog',
            type: 'GET',
            async: false,

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $('.center-content').append(response);


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });

        // Now this ajax will bring profiles of all users
        var userId = $(this).data('user-id');
        $('.current-verifier-section').append(loadingAnimation);

        $.ajax({
            url: 'get_verifiers_of/' + userId,
            type: 'GET',

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $('.current-verifier-section').append(response);

                $("#loadingAnimation").remove(); //to remove loading animatin when content is loaded



            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });

    });

    $(document).on('click', '#remove-verifier-menu-btn', function () {
        $('#menu').toggle();
        $('.edit-verifier').remove();


        // Show the element with class 'remove-verifier-cross'
        $('.remove-verifier-cross').css('visibility', 'visible');
        // Add 'display: block;' to elements with class 'verifier-cancel-btn' and 'verifier-done-btn'
        $('.verifier-cancel-btn, .verifier-done-btn').css('display', 'block');
        $('.verifier-done-btn').addClass('verifier-remove-done-btn');
    });

    $(document).on('click', '#add-verifier-menu-btn', function () {

        $('#menu').toggle();
        $('.edit-verifier').remove();

        // Show the element with class 'remove-verifier-cross'
        $('.add-verifier-section').toggle();
        $('.verifier-box-horizontal-line').toggle();

        // clears the area add the loading animation
        $('.add-verifier-section').empty();
        $('.add-verifier-section').append(loadingAnimation);

        // load the content from backend API
        $.ajax({
            url: 'new_verifier',
            type: 'GET',

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $('.add-verifier-section').append(response);
                // $('.add-verifier-plus').css('visibility', 'visible');

                $("#loadingAnimation").remove(); //to remove loading animatin when content is loaded



            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });

        // Add 'display: block;' to elements with class 'verifier-cancel-btn' and 'verifier-done-btn'
        $('.verifier-cancel-btn, .verifier-done-btn').css('display', 'block');
        $('.verifier-done-btn').addClass('verifier-add-done-btn');

    });

    $(document).on('click', '#remove-verifier-cross', function () {

        // to get user_id in order to sent it backend API
        // I have set data attribute to this element
        // so we get user_id easily by
        var userId = $(this).data('user-id');

        // following will check is selected is already in array, if not then will add it in array
        if (removedVerifier.includes(userId)) {
            // If it exists, remove it
            let index = removedVerifier.indexOf(userId);
            removedVerifier.splice(index, 1);
        } else {
            // If it doesn't exist, add it
            removedVerifier.push(userId);
        }

        console.log(removedVerifier);

        var selectedUser = $(this).closest('.user-block-element');

        selectedUser.toggleClass('remove-selected-verifier');
        $(this).toggleClass("rotate45-remove");

        return false; //! This will Prevent Event Bubbling

    });

    $(document).on('click', '#add-verifier-plus', function () {

        // to get user_id in order to sent it backend API
        // I have set data attribute to this element
        // so we get user_id easily by
        var userId = $(this).data('user-id');

        // following will check is selected is already in array, if not then will add it in array
        if (addedVerifier.includes(userId)) {
            // If it exists, remove it
            let index = addedVerifier.indexOf(userId);
            addedVerifier.splice(index, 1);
        } else {
            // If it doesn't exist, add it
            addedVerifier.push(userId);
        }

        console.log(addedVerifier);

        var selectedUser = $(this).closest('.user-block-element');

        selectedUser.toggleClass('add-selected-verifier');
        $(this).toggleClass("rotate45-add");

        return false; //! This will Prevent Event Bubbling

    });

    // difficult logic for remove btn
    $(document).on('click', '.verifier-remove-done-btn', function () {
        $('.dialog-box-bg').remove();
        var dataToSend = {
            verifierIds: removedVerifier,
        };
        $.ajax({
            url: 'remove_verifier',
            type: 'POST',
            data: dataToSend,
            success: function (response) {
                console.log(response.message); // Output: Verifiers removed successfully
            },
            error: function (xhr, status, error) {

                console.error('Error removing verifiers: ' + error);
            }
        });

    });

    // difficult logic for add btn
    $(document).on('click', '.verifier-add-done-btn', function () {
        $('.dialog-box-bg').remove();
        var dataToSend = {
            verifierIds: addedVerifier,
        };
        $.ajax({
            url: 'add_verifier',
            type: 'POST',
            data: dataToSend,
            success: function (response) {
                console.log(response.message); // Output: Verifiers removed successfully
            },
            error: function (xhr, status, error) {

                console.error('Error adding verifiers: ' + error);
            }
        });

    });

    $(document).on('click', '.verifier-cancel-btn', function () {
        $('.dialog-box-bg').remove();
    });

    // validation section

    // validate btn click event
    $(document).on('click', '.validate-button', function () {

        var habitId = $(this).data('habit-id'); //will get habit id from btn

        $.ajax({
            url: 'validation_form_of_habit/' + habitId,
            type: 'GET',

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $('.center-content').append(response);


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });

    });


    //todo: Bug in here
    //* IDK how Bug fixed by itself

    $(document).on('click', '.habit-sent-btn', function () {

        var formData = new FormData($('#habit-validate-form')[0]);
        // You can append additional form data here if needed

        var habitId = $(this).data('habit-id');
        console.log(habitId);
        formData.append('habit_id', habitId);
        console.log(formData);
        // AJAX request to submit form data
        $.ajax({
            url: 'habit_sent',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle successful response here if needed
                console.log('Habit Sent submitted successfully');
                $('.dialog-box-bg').remove();


            },
            error: function (xhr, status, error) {
                // Handle error response here if needed
                console.error('habit sending error:', error);
                // $('.dialog-box-bg').remove();
                //! IDK why server is repsonding with 500 but it actually getting updated
                //! in the database...so for the sake for time saving I am leaving this Ignore

                //* NOT CAUSING ANYMORE TROBLE JUST CHILL
            }
        });
    });


    $(document).on('click', '.verify-btn', function () {
        var $block = $(this).closest('.block');
        var $nextBlock = $block.next('.block');

        $block.animate({
            opacity: 0,
            left: '100%'
        }, 500, function () {
            $block.hide();
            $block.css({
                opacity: 1,
                left: '0'
            });
            $nextBlock.show();
        });

        var sentTime = $(this).data('sent-time');
        var habitId = $(this).data('habit-id');
        console.log(sentTime + ' ' + habitId);







    });

    $(document).on('click', '.unverify-btn', function () {
        var $block = $(this).closest('.block');

        $block.animate({
            opacity: 0,
            left: '-100%'
        }, 500, function () {
            $block.hide();
            $block.css({
                opacity: 1,
                left: '0'
            });
        });

    });


    $(document).on('click', '.verification-section .user-block-element', function () {

        applicantId = $(this).data('user-id');
        console.log(applicantId);

        $.ajax({
            url: 'verification_task_sent_of_user/' + applicantId,
            type: 'GET',

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $('.center-content').append(response);


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });





    });

    //when verification is verified 
    $(document).on('click', '.verification-section .user-block-element', function () {

        applicantId = $(this).data('user-id');
        console.log(applicantId);

        $.ajax({
            url: 'verification_task_sent_of_user/' + applicantId,
            type: 'GET',

            success: function (response) {
                // Replace the existing content with the loaded form
                // $('.center-content').find('*').not('.stories-section, .main-feed').remove();
                $('.center-content').append(response);


            },
            error: function (error) {
                // Handle errors, e.g., show an error message to the user
                console.error('Error loading form:', error);
            }
        });





    });





    //!------------------------   MENU   -----------------------------
    // Use event delegation for dynamically loaded content
    $(document).on('click', '#menu-icon', function () {
        $('#menu').toggle(); // Toggle the visibility of the menu
    });

    $(document).on('click', function (event) {
        var menu = $('#menu');
        var menuIcon = $('#menu-icon');
        if (!menu.is(event.target) && !menuIcon.is(event.target) && menu.has(event.target).length === 0 && menuIcon.has(event.target).length === 0) {
            // If the click is outside the menu and the menu icon, hide the menu
            menu.hide();
        }
    });
    //!------------------------   MENU END  -----------------------------







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
