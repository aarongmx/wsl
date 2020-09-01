/*=========================================================================================
  File Name: sidebarItems.js
  Description: Sidebar Items list. Add / Remove menu items from here.
  Strucutre:
          url     => router path
          name    => name to display in sidebar
          slug    => router path name
          icon    => Feather Icon component/icon name
          tag     => text to display on badge
          tagColor  => class to apply on badge element
          i18n    => Internationalization
          submenu   => submenu of current item (current item will become dropdown )
                NOTE: Submenu don't have any icon(you can add icon if u want to display)
          isDisabled  => disable sidebar item/group
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


export default [
  // {
  //   url: "/apps/email",
  //   name: "Email",
  //   slug: "email",
  //   icon: "MailIcon",
  //   i18n: "Email",
  // },
  {
    url: '/dashboard/analytics',
    name: 'Dashboard',
    icon: 'HomeIcon',
    i18n: 'Dashboard'
  },
  {
    url: null,
    name: 'Contenedores',
    icon: 'AppIcon',
    i18n: 'Contenedores',
    submenu: [
      {
        url: '/pages/containers/index',
        name: 'Todos',
        icon: 'AnchorIcon',
        slug: 'extra-component-datepicker',
        i18n: 'Todos'
      },
      {
        url: '/pages/containers/register',
        name: 'Registrar',
        icon: 'AnchorIcon',
        slug: 'extra-component-datepicker',
        i18n: 'Registrar'
      }
    ]
  },
  {
    url: null,
    name: 'Puertos',
    icon: 'AppIcon',
    i18n: 'Puertos',
    submenu: [
      {
        url: '/pages/ports/index',
        name: 'Todos',
        icon: 'AnchorIcon',
        slug: 'extra-component-datepicker',
        i18n: 'Todos'
      },
      {
        url: '/pages/ports/register',
        name: 'Registrar',
        icon: 'AnchorIcon',
        slug: 'extra-component-datepicker',
        i18n: 'Registrar'
      }
    ]
  },
  {
    header: 'Applications',
    icon: 'PackageIcon',
    i18n: 'Aplicaciones',
    items: [
      {
        url: '/apps/calendar/vue-simple-calendar',
        name: 'Calendario',
        icon: 'CalendarIcon',
        slug: 'extra-component-datepicker',
        i18n: 'Calendario'
      }
    ]
  }
]

