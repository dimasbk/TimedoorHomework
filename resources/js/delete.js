$(document).ready(function () {
    const deleteButtonsContainer = $(".delete-btn-container");

    // Add a click event listener to the container element using event delegation
    deleteButtonsContainer.on("click", ".delete-btn", (event) => {
        // Get a reference to the button element that was clicked
        const deleteButton = $(event.target);
        // Get the user ID from the data-user-id attribute
        const userId = deleteButton.data("user-id");

        console.log(userId);
    });
});
