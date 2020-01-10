﻿using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Runtime.CompilerServices;
using System.Windows.Input;
using PrintedEditionMdi.Models;

namespace PrintedEditionMdi.ViewModels
{
    public class PrintedEditionControlViewModel : INotifyPropertyChanged
    {
        private static PrintedEditionControlViewModel instance;
        private ObservableCollection<PrintedEdition> printedEditions;
        private PrintedEdition selectedItem;
        private ICommand removeCommand;
        public ObservableCollection<PrintedEdition> PrintedEditions
        {
            get => printedEditions;
            set
            {
                printedEditions = value;
                OnPropertyChanged(nameof(PrintedEditions));
            }
        }

        public PrintedEdition SelectedItem
        {
            get => selectedItem;
            set
            {
                selectedItem = value;
                OnPropertyChanged(nameof(SelectedItem));
            }
        }

        public ICommand RemoveCommand =>
            removeCommand ??= new RelayCommand(() => PrintedEditions.Remove(selectedItem));

        private PrintedEditionControlViewModel()
        {
            printedEditions = new ObservableCollection<PrintedEdition>
            {
                new PrintedEdition { Id = 1, Name = "First", Author = "Some Random Dude", Price = 200},
                new PrintedEdition { Id = 2, Name = "Second", Author = "Another Random Dude", Price = 150},
                new PrintedEdition { Id = 3, Name = "Third", Author = "Other Random Dude", Price = 500},
                new PrintedEdition { Id = 4, Name = "Fourth", Author = "Dude", Price = 700}
            };
        }

        public static PrintedEditionControlViewModel GetInstance() => instance ??= new PrintedEditionControlViewModel();

        public event PropertyChangedEventHandler PropertyChanged;

        protected virtual void OnPropertyChanged([CallerMemberName] string propertyName = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(propertyName));
        }
    }
}