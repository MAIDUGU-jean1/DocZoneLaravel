// Book appointment button functionality
alert('hello');
const bookBtn = e.target.closest('.book-btn');
if (bookBtn) {
    const doctorCard = bookBtn.closest('.doctor-card');
    const doctorId = doctorCard.dataset.id;
    const doctor = doctorsData.find(d => d.id == doctorId);

    if (doctor) {
        appointmentsModal.classList.remove('hidden');
    }
}
