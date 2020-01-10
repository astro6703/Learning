﻿using PrintedEditionMdi.ViewModels;

namespace PrintedEditionMdi.Views
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow
    {
        public MainWindow()
        {
            DataContext = PrintedEditionControlViewModel.GetInstance();
            InitializeComponent();
        }
    }
}