$(document).ready(function() {
    $('.read-more').click(function(event) {
        event.preventDefault();
        var articleId = $(this).data('article-id');
        var fullArticleContainer = $('#article-' + articleId);
        var readMoreLink = $(this);
        var articleContainer = readMoreLink.closest('.article-container');
        var articleHeight = fullArticleContainer.outerHeight(true);

        if (fullArticleContainer.is(':empty')) {
            // Load full article content using AJAX
            $.ajax({
                url: 'get_article.php', // URL to your server-side script to fetch the full article content
                type: 'GET',
                data: { articleId: articleId },
                success: function(response) {
                    fullArticleContainer.html(response).fadeIn();
                    readMoreLink.hide();
                    adjustSubsequentContent(articleContainer, articleHeight);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching article: ' + error);
                }
            });
        } else {
            // Toggle visibility of full article content
            fullArticleContainer.fadeToggle();
            readMoreLink.text(function(i, text){
                return text === "Read more" ? "Read less" : "Read more";
            });
            adjustSubsequentContent(articleContainer, articleHeight);
        }
    });

    function adjustSubsequentContent(articleContainer, articleHeight) {
        var nextArticleContainers = articleContainer.nextAll('.article-container');
        nextArticleContainers.each(function() {
            $(this).css('margin-top', articleHeight);
        });
    }
});
