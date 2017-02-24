<table style="width:100%; background-color: #f2f2f2; border: none">
    <tbody>
        <tr align="center">
            <td>
                <table width="500">
                    <tbody>
                        <tr><td height="30"></td></tr>
                        <tr>
                            <td width="30"></td>
                            <td>
                                <table style="background-color: #fff; font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #333; line-height: 24px">
                                    <tbody>
                                        <tr>
                                            <td width="10"></td>
                                            <td height="10"></td>
                                            <td width="10"></td>
                                        </tr>
                                        <tr>
                                            <td width="10"></td>
                                            <td align="center">
                                                <img src="{{ asset('img/logo.png') }}" width="72" height="72">
                                            </td>
                                            <td width="10"></td>
                                        </tr>
                                        <tr>
                                            <td width="10"></td>
                                            <td height="10"></td>
                                            <td width="10"></td>
                                        </tr>
                                        <tr>
                                            <td width="10"></td>
                                            <td align="center"><h1 style="font-size: 20px; color: #555; margin: 0">{{ trans('app.name') }}</h1></td>
                                            <td width="10"></td>
                                        </tr>
                                        <tr>
                                            <td width="10"></td>
                                            <td height="15"></td>
                                            <td width="10"></td>
                                        </tr>
                                        <tr>
                                            <td width="10"></td>
                                            <td height="15" style="border-top: 1px solid #ddd"></td>
                                            <td width="10"></td>
                                        </tr>
                                        <tr>
                                            <td width="10"></td>
                                            <td>
                                                @yield('body')
                                            </td>
                                            <td width="10"></td>
                                        </tr>
                                        <tr>
                                            <td width="10"></td>
                                            <td height="10"></td>
                                            <td width="10"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width="30"></td>
                        </tr>
                        <tr><td height="30"></td></tr>
                    <tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

