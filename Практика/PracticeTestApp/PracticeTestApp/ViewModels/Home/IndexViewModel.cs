namespace PracticeTestApp.ViewModels.Home {
    public class IndexViewModel {
        public IndexViewModel(string message) {
            Message = message;
        }
        public string Message { get; }
    }
}