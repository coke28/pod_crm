// PUBLIC CHANNEL  TEMPLATE
$(document).ready(function () {
    const channel = Echo.channel("public-category.1");
    channel
        .subscribed(() => {
            $.ajax({
                url: "/category/activeCount" ,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    // Your success handling code here
                    data = JSON.parse(data);
                    updateCategoryCard(data.categoryActiveCount);
                },
                error: function (xhr, status, error) {
                    // This function will be called on AJAX failure
                    updateCategoryCard("AJAX Request Failed:", status, error);
                },
            });
            console.log("subscribed");
        })
        .listen("FormEvent", (event) => {
            console.log(event);
            updateCategoryCard(event.categoryActiveCount);
        });

    function updateCategoryCard(categoryCount) {
        $("#active-category-count").text(categoryCount);
    }
});
