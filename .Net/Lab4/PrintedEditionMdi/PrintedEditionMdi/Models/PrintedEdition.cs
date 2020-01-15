﻿using System.ComponentModel;
using System.Runtime.CompilerServices;

namespace PrintedEditionMdi.Models
{
    public class PrintedEdition : INotifyPropertyChanged
    {
        private string name;
        private string author;
        private double price;

        public event PropertyChangedEventHandler PropertyChanged;
        protected virtual void OnPropertyChanged([CallerMemberName] string propertyName = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(propertyName));
        }

        public string Name
        {
            get => name;
            set {
                name = value;
                OnPropertyChanged(nameof(Name));
            }
        }
        public string Author
        {
            get => author;
            set {
                author = value;
                OnPropertyChanged(nameof(Author));
            }
        }

        public double Price
        {
            get => price;
            set {
                price = value;
                OnPropertyChanged(nameof(Price));
            }
        }
    }
}