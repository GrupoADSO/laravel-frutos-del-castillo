@extends('layouts.dashboard')

@section('contenido')
    <section class="card--container">
        <h3 class="main--title">Today's data</h3>
        <article class="card--wrapper">
            <article class="payment--card">
                <article class="card--header">
                    <article class="amount">
                        <p class="title">Payment amount</p>
                        <p class="amount--value">$500.00</p>
                    </article>
                    <i class="fas fa-dollar-sign icon"></i>
                </article>
                <p class="card-detail">**** **** **** 3484</p>
            </article>
            <article class="payment--card">
                <article class="card--header">
                    <article class="amount">
                        <p class="title">Payment order</p>
                        <p class="amount--value">$200.00</p>
                    </article>
                    <i class="fas fa-list icon"></i>
                </article>
                <p class="card-detail">**** **** **** 5542</p>
            </article>
            <article class="payment--card">
                <article class="card--header">
                    <article class="amount">
                        <p class="title">Payment customer</p>
                        <p class="amount--value">$350.00</p>
                    </article>
                    <i class="fas fa-users icon"></i>
                </article>
                <p class="card-detail">**** **** **** 8896</p>
            </article>
            <article class="payment--card">
                <article class="card--header">
                    <article class="amount">
                        <p class="title">Payment proceed</p>
                        <p class="amount--value">$150.00</p>
                    </article>
                    <i class="fas fa-check icon"></i>
                </article>
                <p class="card-detail">**** **** **** 7745</p>
            </article>
        </article>
    </section>

    <section class="tabular--wrapper">
        <h1 class="title header--title">Usuarios registrados</h1>
        <table>
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Categoty</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2023/05/01</td>
                    <td>Expense</td>
                    <td>Office Supplies</td>
                    <td>$250</td>
                    <td>Office Expenses</td>
                    <td>Pending</td>
                    <td>
                        <form action="#" method="GET" style="margin: 0">
                            <button>
                                <svg class="icon icon-tabler icon-tabler-pencil" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                    <path d="M13.5 6.5l4 4" />
                                </svg>
                            </button>
                        </form>
                        <form action="#" method="POST" style="margin: 0">
                            <button>
                                <svg class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>
    </section>
@endsection
