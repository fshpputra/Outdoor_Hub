const loadFile = (event) => {
    const profileImg = document.getElementById('profile-img');
    profileImg.src = URL.createObjectURL(event.target.files[0]);
};
