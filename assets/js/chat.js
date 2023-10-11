class InteractiveChatbox {
// membuat konstruktor 
    constructor(a, b, c) {
        // mendefinisakn beberapa argumen, button dan chatbox
        this.args = {
            button: a,
            chatbox: b
        }
        this.icons = c;
        // mendefiniskan state, apakah chatbox terbuka atau tertutup. diawal akan terlihat tertutup karena dibuat false
        this.state = false; 
    }
    
    display() {
        // mengekstrak argumen yg sudah dibuat
        const {button, chatbox} = this.args;
        // menambahkan even listener, saat klik button maka akan mengeksekusi 
        // toggleState yg digunakan untuk beralih status shg chatbox terbuka
        button.addEventListener('click', () => this.toggleState(chatbox))
    }
    // mengimplementasikan toggleState
    toggleState(chatbox) {
        // membalikan status dari state, true menjadi false dan sebaliknya
        this.state = !this.state;
        this.showOrHideChatBox(chatbox, this.args.button);
    }

    showOrHideChatBox(chatbox, button) {
        // untuk mengaktifkan chatbox, karena tadi state sudah dibalikkan 
        // maka this.state yg semula bernilai false, sekarang true
        // maka dari itu chatbox ditampilkan
        if(this.state) {
            chatbox.classList.add('chatbox--active')
            this.toggleIcon(true, button);
        // !this.state bernilai false, chatbox tidak diaktifkan
        } else if (!this.state) {
            chatbox.classList.remove('chatbox--active')
            this.toggleIcon(false, button);
        }
    }
}