using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Dino
{
    #region Tbl_employee
    public class Tbl_employee
    {
        #region Member Variables
        protected int _id;
        protected string _eFirstName;
        protected string _eLastName;
        protected string _eGender;
        protected string _eDepartment;
        protected string _eDateEmployed;
        protected string _eSalary;
        #endregion
        #region Constructors
        public Tbl_employee() { }
        public Tbl_employee(string eFirstName, string eLastName, string eGender, string eDepartment, string eDateEmployed, string eSalary)
        {
            this._eFirstName=eFirstName;
            this._eLastName=eLastName;
            this._eGender=eGender;
            this._eDepartment=eDepartment;
            this._eDateEmployed=eDateEmployed;
            this._eSalary=eSalary;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string EFirstName
        {
            get {return _eFirstName;}
            set {_eFirstName=value;}
        }
        public virtual string ELastName
        {
            get {return _eLastName;}
            set {_eLastName=value;}
        }
        public virtual string EGender
        {
            get {return _eGender;}
            set {_eGender=value;}
        }
        public virtual string EDepartment
        {
            get {return _eDepartment;}
            set {_eDepartment=value;}
        }
        public virtual string EDateEmployed
        {
            get {return _eDateEmployed;}
            set {_eDateEmployed=value;}
        }
        public virtual string ESalary
        {
            get {return _eSalary;}
            set {_eSalary=value;}
        }
        #endregion
    }
    #endregion
}