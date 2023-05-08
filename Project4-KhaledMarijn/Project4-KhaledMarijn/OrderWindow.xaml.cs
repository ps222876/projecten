﻿using Project4_KhaledMarijn.Classes;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Linq;
using System.Runtime.CompilerServices;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace Project4_KhaledMarijn
{
    /// <summary>
    /// Interaction logic for OrderWindow.xaml
    /// </summary>
    public partial class OrderWindow : Window
    {
        public OrderWindow(Customer user)
        {
            InitializeComponent();
            DataContext= this;
            User = user;
            PopulateOrders();
        }


        #region INotifyPropertyChanged
        public event PropertyChangedEventHandler? PropertyChanged;
        protected void OnPropertyChanged([CallerMemberName] string? name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }
        #endregion

        #region fields
        private readonly Project4DB db = new Project4DB();
        private readonly string serviceDeskMessage = "\n\nSomething went wrong";
        #endregion

        #region Properties
        private ObservableCollection<Order> orders = new();
        public ObservableCollection<Order> Orders
        {
            get { return orders; }
            set { orders = value; OnPropertyChanged(); }
        }

        private Customer? user = new();
        public Customer? User
        {
            get { return user; }
            set { user = value; OnPropertyChanged(); }
        }

        private Order? selectedOrder;
        public Order? SelectedOrder
        {
            get { return selectedOrder; }
            set { selectedOrder = value; OnPropertyChanged(); }
        }
        #endregion

        internal void PopulateOrders()
        {
            Orders.Clear();
            bool result = db.GetOrders(Orders, User);
            if (!result)
                MessageBox.Show(serviceDeskMessage);
        }

        private void RemoveOrder(object sender, MouseButtonEventArgs e)
        {
            if (OrderList.SelectedItem != null && (Orders[OrderList.SelectedIndex].Status == OrderStatus.queue || Orders[OrderList.SelectedIndex].Status == OrderStatus.preparing))
            {
                bool result = db.DeleteOrder(Orders[OrderList.SelectedIndex].Id);
                Orders.RemoveAt(OrderList.SelectedIndex);
                return;
            }

            MessageBox.Show("Too late!! You can not cancel your order anymore");
        }
    }
}
    