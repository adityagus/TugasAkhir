<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ url('user/dist/assets/vendors/bootstrap-icons/bootstrpap-icons.css') }}">
  <title>Data Barang</title>
  <link rel="stylesheet" href="{{ url('frontend/styles/style.css') }}">

  {{-- <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon"> --}}
  {{-- <link rel="stylesheet" href="{{ url('user/dist/assets/css/bootstrap.css') }}"> --}}

</head>
<body>
  <section class="kop-surat" id="kopSurat">
    <table   width='100%'  align="center">
      <tr>
        <td width='10px' class='gambar'>
          {{-- {{ url('user/assets/images/logo/logo.png') }} --}}
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFkAAABdCAYAAADOmsq5AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAABxZSURBVHgB7V0JeBRlmv7+quozV+cAglwNisgdDCKMV0AED05ndBQdAc/RmfWYnXnG3cExirrr+jigOO6qIBEPRJzlCHgADkFGcRgYAwpKcEgTCDkgZyfpq6r+/b7qrqbT6U66k25gnuV9nj9dXV1VXf3W97/f8f9VATiP8zjXsXXTpke72obBeXQb29etsysGQ7no82VOnju3Mdp2ApxHt+ETxUJJkkAVxTmdbXee5G6CrNiakjJ/yMUXAxeEazrb9jzJ3QRZMRHcKzeX3p635ERDt+K+/fuD2WKhZtuyeXNetO0l+CcD/kCbG8CGWmgXOLfTOi6KGVxVM/VtcL1DWw/QyBlrxO7caPB6HZ05p3hAVjwMrVhHrz59oMLhKMDF0kjbn7MkE5myJOUxQRgLnJOVULMzSbKlGQyaBVmwESSjEcgB6ZBlGWSvV3v1+XwgY3O7XLBt0yb6uBQYc6iqehQvRgk6Lce0m24qjeO87IaAFevIzM6GYw7HbFxcGmmfcyqE21pcXCCgE+GcF+DbvNS0NFtmTg6kpqdDOjaz1dqOzHhBpLvb2sCFzdncDC3YaLnF6aSPS1TO9xHxoqKUotU7Ih1jy8aNRaPGjWtHMl3EHVu2NGIoNzhSbznrJBOx2K3nCIzNJ20jR0LdLy0jo0eExgMi39nUpJHeUFenNVxXiqTvQILWXzdzZgltp1lxenr5FVOmdDjG3q++goZTpybr24birMgFSYFiNM5HGZiDRBYMGDwYLiAngpZ6NkAXk7o8NToXAhKdh6Tn1VZXP4Iy04gSU6JwbgvV4lBkZmURyQW4WNLh+HAGQeSqRuMjeLKP2jIzbRQC0Q87FxFKOuq5DUmfgyRCqEyEb88YixgvnxG50MlFrX0UT1Ij1xxwWmcT3OMEXrELuLMamRCA9RoGQv/x0F1adnz6KXCXq0OKnXRL/nTjxjkKY0t69e5tv3jkyHOGXOVvb4K8fw1wtxfUJo6vHBiyIfS9AIxT7gdxxCyIF6noR5oVhax5Q+j6pJEcKJ6sxMig4OIRI84ZWeCnDoMXC2fcWQvKCQWbChzZFQYNB7HfEACTBXz794NSr4Bx0kwAMXaKeqPDbkTnB2eC5G2bNz+C8Wzh0KFDbQMDjuRcgFr7HXg/vAe4jDF0mYLWawbT3IVgnD4PmCUVegqKjMoOHKB4uV35M6GarGmvwbAkJT19wdjx488JaQgCJcLz/jxNf+UKBSBtDFgffA6EnAsgkSBddrlcg28IibMTZsmaPEjSdvTGdnJsyYxxKaEIR3jWFw7fX5ZoBCu1KrCcSWB99EVgRjMkGmTNJ44fp4JRMPtLCBPbsTiCYdn2oSNGJEweiMiTp+rB5WwGt9ulZWh6qswCtYlQYI3CBv6ahj+RwdQbM0bNF6QqdaAcRs/v46C6+kDKw4uSQjDBht+HJBdAIknGQH0+6u/SS/PzbT1xbhqpNTVQXV0DtXVN0OTCugOmgqLq29E3RVzqw1QXC0ONc7so8nyMPQrrFXa8ELYaxgowkxxrb9g2sZ/sNSvHVfDecC+k5fSFZIGc33cA7eLlHmkyEYy6W0T6S/WFeEFWeay8XEtjq2pOQZsM0CqHnRLHyFP1jHrojp8cgW6AY2TmXpZ/hMtgb/3eUrpv1uONeM4FZBCUWJw2DLyiCXJRf/38c+p5wRS725asE5w/aVLcDo5ILT98mF4bsT7wFtUHatvgLiawhR02ZsxiBOMLuPRj6AY8r0yYBky1KzUKiK7mn02dMeNbsnZvc9007/efPO+DE7YM+QRecQ+AwQIspTeIQ68DcfhN+N0idAd04ZDkAgik2N0imRKM7hBcdfw4HCkrozS1BN8WOX2+DXr3X/7ehgkiRP5RoijMXfnehusXzpv9CcQJzpSf4R9MONStWW/v/5bWXV3+dA4ziL/Ei2sjA1bqVVAaVbwi+CErA7bzLyANfh1M81cAS+0D8YKcH5Y+g5IRN8kURTCTaWU8IVoouZhaPxWpUsVVfrSTcRrGBOmVFauLtzIOEtYIpCnHX0jNcR02UIle1fq6oCKVKpZK/2JdVPGydszX8g0eL1yhtGBG5+Sv0zrf0vwrfQL7AAnuS8TKDpmDm+/wSabVZdMfei1/8lQQnegoy/YBb3MhyRA30lA6DQZDHoW0lGLHRbIepo0ZO9YWiwaTLJQdPEglxKjk6vCq6v7OTgZpuhCd2IUkm5LqhlRvdeATNXBtVP9fRSnW93H7hKtxTzu41GoFLFv4Hy8d7lbZejxEtoKxslyl1OLFvT/zvW82YJ14QTbWrk25AwCwSUPzoLugyAZzBVuD10sHKYmLZCIYY2A71Xs7Azm0g6WlcLK62oEmtrAzcnW01bRUWAdkQSzIch8Fs+KM9JEKHmWL/oYr6lTUeVAb1N1Zswe2umvK6QJkK1UK+CqVowz4FCRYc6jYA+b3HTAAEoVAik3xcuwkf7Z585O5/frZB0epp+qgMIwIxtGCl5yyXDg3xnG1nL6ZP0VrV1EKuhzc7dv6TeQPGPw59bnaGv0tSvEMhhGL0qi8464+UoiicyHKBmV8jSDJc22rDmoEa8V4jDiilTG7A+rpPFD6jIlk6koms1kbAo8Gsl6ShqqKCgcK49xpM2cGx81eW7X2coNgvk4W+Lr75806ELrf8ytWpOVY+yxBgu6hAEpAy0tLsUJLqwsUVY34XX3aDkRczzl7W192/8/lQ7lPGaU2KCqzGytQVFYwWQXfDzL+eP505qqDXwfPXZIW9E5wAYsiDAOOUZIud0mypsOMPdmZo6Nhm3179lBC0cF6l7+zeZAk8dUoG4PRSz2xck3xR7IivHrfvJu2Fq1ed6EK0p8Yg7H69peOHAaSKIDRYISde9D5YKDr8figsQnH5tweSJdPgU2u7HAOeIFamKqWBFeo8vW0Vm2DL4x2DA05T5MrVSppbre9983SsH3nD+mih3YHFGVUV1TM6ZJkGv6+CHU4mqOjyAEtuNHr8Tw2bdasovDPmaAs5SAEcm1mRA82RxL4nJWriw8g8UNQHrQrJwoCqBgnZNnSYcvO3XBl/hg4caIejhytQat2B493Q9rXFHhFAN9hLayq0N+pCruTYUdA4r8ELvyGY3imVileLnqox1DmAeUL7GbvRTfd6WmosEtle0HGMqeQ1QeEXv0onoFYQD1YH5hVcEAVi0PayLheBqDZRZ2SvI3iYRz+jqbDRzChKD90yC8Ps2Z1GFZf8e6m+5G7yLNrGBupLw7o2xsGD+xHcRySWgUTxoyAg2UVsP/g0Q67jbE4Ih5OVtn/6suuZWPool6mtij1Qj/xWrrUGKrR4V/EiLjOecfYnyuM3wNeyHMfOyBZ+uaC2ngKhN790dJRpir/AUJaFrCMLC3d99FAaxQSkWTqtY7gNANBKAdFOUpTDVq9XsfcLkM4HNEY0gnBGPuW4pfMvSHC8Pkfln+QJYh8cVepat+cLEhFGRLRcjxYrKisqkMN3wyy0lGPs8QWGGysiXAU7kvLcAVJ5tx4Ex6OgSQ0MSMbr6KzUxrUSlXgOwWw7FK4OhxV6L2GQaNfLp9066rREyZCCxJIJDobmv2j14ePtScRgEavm3QSY62lEKKSTM4OQxp7JI97EEcOThw7VoonNjnal1iMUj7+kJzOel06OriJ+aNg/Sc74dtDFdAn2wYbt+zClIJH3H6YqRIMLJIzFLaxxxq186AEBEeUfoVMe8HEcmidclQm5v+GF/I9PCfkhk/D0G3blo3PLsB1jv179tC+Goki56U08ygeErtCVAq2FReXX3HttfZwZxcLwTrefGfjDDTRjai7Hb6Hogj7BblQfqwWxo0cCkVrtsDJer8VhQJ/MNY2YROGGm+/NKDowTTBPbXjr2APpTxR+d+02LZs3I8ZiB8iqSrliSqmzN4yn5vUGQ92Eozegsyi7x1wBhExJtWtOJxgkohYCSbcfeesTejfH0DraQ3/LCM1BdxeBT758154ZeVGjCakDgQjUV8InOWveX3R3GfGrtqcLriv6PAlqASKAp9pi4V47UB8RluPBFP9WD6q4DViZkw8XOCDyWeaYEJEkjF9fTJci3UNjpVgHQtvn/2GKis/oVAsFJdcaMc2EH51/4/hwkF94WhlbfAzv/WyX13SX7l69fLf7ad1A5paJ+P6DjEkpi670gsry2jZk33Zf+E2l2jHQMlRHDiO5+F0QIcoGK7KXLu/HM4COmhyJCummi9FEeTkuqNR9/5s9idvri524KKd3qenpMBLb2yAWdMmQvXJBig98I9226P1Pr76jd8tCV2HZZzbI2mbytk6evUsy5+DevCvtMxxY/mIAiQVmPUVSwLcm/b232vhLKEDyWTFoc6OwhW04kYMYybfEGUSXldY/vaGi1CW7bQsY9Y1cugQyM6wwT7Mah3H2kcLWAha9v7yRS+GH4OBMCUQ3oZurQoeYU3bK5fOVTj7QFB4o1KjYlNaVLf6CZPUtZg674azjHYk0+Q/s9Vq10cLSCP37tpFdYhHu0swQRCFq/TlCnR0+63lMGLYIJheMB7+Y9n7IVtyR29zxm/C9297JncCyk3/DhyD4FDNymjeWCcIBvFfZAWrRlZvHaU+AR3Malnc93qmwKmUwqo9kGTQRHBMfubg0Ffp1Fmz1uvr25GMP2RBqBaXHTigpcpTZ858C3oA7LIzqas7W1zQ1OSG4q1fwVd//w6GXzQAPF5fcDuUiUeXLXvYE76/IsH1gsr9hqxFcHrOxocwzj5mHI+BqbdfTjqKiirBPHyhqpJPP0IyICpKHmZ4T6I/KcK3kUnGQHu2bsWULlcdO+ZAgru8T60zvLBqVQp698to+Uh5DYwZOQRGDrNDbk4mvLvus9MbcqjyNckfRzoGJjXTNNMkejD0AyK8HdnRgTK1O1WuXIOLRPQt2J7Ath+SAMx8bSi3EO7kgyRTCp2ZlWUjh6fpMI5kkA5DN7By5Uqzz5A9VZKEy5DgAmSifwtacc3JJpiQZ4QtJXs0kg8cOp02IxkfrF1b6A0/VtsfsvvhKf+IRkRPEx141S2bRyWbPN/DrFBzuFSs/gGSRDABZcIuSBIoYaGodPpsYI5etKZoAoku6rYOm3MmGhgLjFD4f31lVQNYzEa4auIYGJ93CRZVXLB9177gLujwdkQ6lGw0TBUxhAgSKvD2Fh1OeIh1M5UvtRYe/ysuzsdGfuFtSCYYG8swUkdLbld0CZKMZn4NSQVZccWRIw604qcgQSAjPFFVr9WH/7hyA2SkpYLJZGi3DQ6iHo+0ryiqd7aXCggQqxPM/MTzwHJAuzHfq3ZzD/2G3ED7Att2SC4KBFEksjtOnSWvmJqWpsXGB/fto3N8qyfRRDiam1vB6/N3IX/I1rHII6u+lvB1/CMwuSr5JK4TG5QH8BOqvYY4RAZBy0ZpfCb79/V0zMewkew9iM0JSQJFZjRVjKMhYT2kXdKjRTqoJQU0wkpWTM4OQ7ciSCCcOMpBSE+1wuzpkyBvxBC4b94N7bbBXtYh+/TWZt8IEk9hEgcm0nQivUHYcqBJwXUHrGmpy3HN9cg7OV2Ku7+DJIIiMyMaKQ7kYroK7eTCT3JAKsjZ0b0RibRiQlOzn+TmljYsNKjwwF0zoNXlbreNygz9wvczDhpdXNdgttY1YXOarfUtJmt9GzaX0VrvMVq5gS/QiA02oFcuGJWH2MPk4+BGXPsp+MO3pILkliyZnB7dMxj6mV+T0SvSyIcWUfh8CdNiHa2t/tCXaUVe9D4fbtOcoMVkApcn8BlXyDFtCd2PTS4hjZGjHbftjZyF/nAZQhwh22j5Ze3n4K9h0J0+NFjqgCSCShE4EGun0A3PoDT8dga9i+bRCABNPkmEFSuq3AYhlTdfIKShkzBgtW1i/gjIzEiDFKspZC9+HcQB17sZQ9BErgmTElk0q7/Gj2nK5k3YDmH7EpIMKkWYrFat6A9hUqF9rjk9tGIaykcUQQJw7x1zd38ktmW4Bd6fgXJla4u7TP9s5+5v4VRdE0y5ahwMx9T6NNjlt9z99KRYv0Pl4u80YgNSoZFt4P9uvvck6cTN2KjuTDLRAEkEWTHGxnaSChpJwf60LnwbAXNtGw5da7N9VMb2QYKw9tZblQdvnVm54LbZX2AvXqmvd2P6+91hB9Q3NEFOZjpa8+l5wljIXxTLsfm7GZlI6sx2Wizyw80G8VVcmo7tJ9hoyP8jSDLIis2p/rlcRHIkDgXtJnDUSpSKxnjuMY4HGNRs1Zed6PzyRg2F73+ohEM/HIeLh5yu+KFm33j7vU/f2dXxvGbMIkXoFYwmtFf4be5dNeRNKWskcjdAkkH3xhixoEZRBTk8VZYj3qctUL4t+7UkKQQT1i7/t72o0cErvGrtFtiNBaKB/XqBLT0FUkOsGceMlt26cPHUzo6HBaNH/dYLmhVzAT6z3llH3fR2bLeBPx7+KyQRNB8FnUxh0IrJgWNkFmlbygFtPj/JDkgmGLyjL9LEoJHDB8OVE0fDpPzhMBrj5uBmjNkEia2Zd9+zEWf8OTeljkKpuEqzXoNmxVhK9lDCQVMMSOSbIfmZHdDtc0iwTcvwEF7MMdCxR6xWatGF27/BUUgi8Ph1+jJFG3/ffxh2fvUNlHy5D/rn5sBlecNCN8/CgaMvbrvnmV/7qz+nIRnZL1EiWDCqkPhrqbdqk+PoovTCRnOQkzoKQvMCRUkq0K2YEhCMLBzRJlZKlN1JklSCrw5IEm5/4LlJqiKvCK31Hj1eA0MG5kJOdgZMGj8CR62rtThaLxMyinEFeOG2+569W2WLn8c0Zu3KG1/BEodntl67QPpPWdr478FfYbso8Nqj2ndXoJuQsGZcmJIZfIYJuFtaokpF4LckFzc/WDjEIEuf4xd1yOisFhPc/dPrtbqywWCAB+fPgMVL3ok47wL3d08ftdvx07ztl2jGrU3Bgl+Ypza/hh8/B36FfhPbQUgS9PnZqdnZWsimo/nkSfC43YOj5RhJvbd60eJXhx2uqNsciWBCm8sDrxRtgIfmz4RUrGssff1PUSe24FrzxCEHLtGiCf89NN+aJjtprsXV4NdjSjqSTrAZC2mhBJMWo1x0msT1iGS6wUV/FhDGh3bs7oOw29gw9s5D1bR/XVYLLIbOsu7jL+DmG6+EJmdb1G3sOdUwqE+NZsGapHD2AKoLDePQlHuqRb8MSYL2qB6DYZ0lNdWu67AOkgq6i6Cz/TslOSKJ9BwgfE8kkmclHRWxq9Ny+Psrs7Lh8LE6LAx5OvsaqKqthz8Wbex0mymj9/oFgVGdAz6wTHCS5c7ERlki3Q/S+Zd0EwGCtyPBeeEEa1aMvqyrOwkkSqtpALA7JHYFn6sNrhzTf+dHX/5jDL7N6LABwyiAa+tNnR3HYvTAZcMOaakzWrKPg/Jb8IdrlNmdgiSlziQRAQvuQDAh4PAKuzqOJKjqAsFofMRkNgeJ1FtPQWlmL5v5LsbVqzkTTnt9zk8ITHi5RZZeTZM8doULf8K1Q6MdZ+IlB8Fi8filQuSLLaPcNIpyFzaaUEiOrwkSDF2DI0kEQdfiqTNmdBnNkG2sx3GpRyIdqCfwud2hDsFx2z2LR2Ci/3O03BeVJuX599c+oQ+afnPL/f95mcjkRUjiryMd60ejv9GkAoOKcrfbuAxdJj1eJR/8pdFdkGDQKIfC2DpLWprNlJLS4XOKi8mKMYlbGMvxBAyUS6lEFz6M3VPQlYaQqt77K554vE0xDHh/+aLF4aPSa19/vOn91xb9RgDxOkwxToZ+1r93LQwdWKl5D0FSnsgc10j1ifvBb70fQpeTAuLDZ5s2LcFEY3taTk5EgglEMGrxS7GWhTXXv23Tpu2pWVkFoaFJT0BXGmPHRuxKmfHue9t9z1Cp8kL9/YIZm6FgHI47Kuxzy+DWa3DVYvBHFDR+l7DEQ3/SDHJQQIkGizKxmiSwpa7OEc+0NS2tRive4fMkzjnTiUDIDJo4EbwwRoMXxo86RFbMzVb5bvA7yGPgd3TFkCBQmqwajV+jPBSgsUUlmIynrakJFM4fi2dwQw/hSlAynoQEIRA7xm1lhYWFwveV3KYnopPGHMAKHU2Mh9dZHw9N/aRoQsFG/bgeegjSXvymlRgt2a0ZGV06e/pdWNJ8anrIPLdYoJFMcR49YA6JsbEY7/qJBq2uilc8EA7GhcPH+QUQcrPktZdThRTqFJGRAVABiPSMLP0N6AE0crHYjqQWELmxyCQR7HG5SpGrQogToclIKUYEBcYePjcInQZQl8OTKtpWXFxIcaTo8+2YHEP38qriAN2Yhg44BgNza0nLnk3t00YDk78A/8DoauhmyBZKLkVTsf5WipTcTqc2Pxu6gSDJaDEb0AoLIAEgyyCi0aLtRDYpNPaUIpKQzrKjkwPVv/WqFG6WgD1w9fjSyRizHTX1bXsJ/FNXMOXTdGQvxIHQB//hedlowNNgjv3RONQzUYd7ND87qA2UQmNCUp7eqxckGtqED3SGFNbhCIJDKwuq6oZoT3dtPWm9QJShTGZsdmpu62cQJ7QsFmA2Pb0WLbfASMSaTBBv9ETn7Tx1Ck9VnRzLTfjR0E6A0doakGRbIrK9aNAJpy6o3bHJOQ170TONS7mq7qO4fcLEO26XGL/alOu6vavjkXEYRDEPRJF8QAEekOaj2chau0OsDrJgDNXorp+Fke60jQftCkR4xTbgj58fLQhPBOgCkhbqeog/Jg+tOw+/W5u3oAgCOJ1j4LDj53XbNuVEG0ay0YOc9PoK+QGaskqvRG5PnTdd/NaGhkYk+LGeEkxoRzLabwkOqs43wZmDGCBHh8XwPfhgLJgyhmcbFKUg0j40PZWITEaP87S2gsvpbMSC2eRItzJ3B+1n2ivKerSqlXAWkWbeBadabklYkSpWUFkBIwgi2dETJxcJ7WZS0hwu0shAxnbGIQn14FUuAEW1wZkE+QnSX09Ly1tOWR6X6AmXHYv2mGKjNuYlqo4RDwxiLTS2TYczCS3JaG2lR6c9dd2sWUshCegwJ5hKn4msY8QDl28YnClQb6XwDEku8Xq9466bMSMpBBM6WLJW+vTf99BjLx0/kv99RC5ZL8XrsT6EqqeI+Ks6K31q+lVfr8WfFIadDVnpDoLker2NSO5TybTccEQcSA2UPiOSrBWsVXW91+0uwQxuAUYAmn7r7UxGBF1Be34RhmSU+GA8XoKrimIZLko0oo1Wl2B3ehLS0tqtJCum1BiHXfR66kuUcWFsXSC43bMp28KY10YDrUS4FgMbDHAmQQmNllGiXyGr1Z8FeiZkIRqiP1QEU+yMPn3alT6pYI0kkzVEHduiuoHgf7RtAZo8/VshOxGtjXDT0ygCy4nQ+8AcNH+qTuSSw1ZVBxacN5xtYkMRfd4FFnGwm83R098QK+50Ikdgfi41qp7BOqyCpSLZSAI9loxqCxQE52mzN2mKAd32FHjVidfuLRGE4PcStPsxMPWmV21MkqaGIqGcHrDE+T56rI23i5k8ZwtRzYn+96fJYllCRW1CLFYcD4j8FKPRTjP9afJM6H8iQ8dE9yhrX6zPNkXSG5iiNNHzgUKfVAX/BIhqyWh560VR1B7sEasVx4MAQUmbeH4uIepzManbcVl26HMMEEXnYlf8Z0CnDx/FUdkdnra2hFvx/zd0SjKVPinOhPNW3CN0SjKVPun1vBUnGbH8h/HzOI+zjv8D23gRm8RT7CsAAAAASUVORK5CYII=" alt="" width="90px" height="90px">
        </td>
        <td class="instansi text">
          <h5>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN</h5>
          <h5>RISET, DAN TEKNOLOGI</h5>
          <h5>POLITEKNIK NEGERI BALIPAPAN</h5>
          <h5>JURUSAN TEKNIK ELEKTRO</h5>
          <p>Jl Soekarno Hatta Km. 8 Balikpapan 761129</p>
          <p>Telp. (0542) 860895, 862305 Fax. 861107</p>
          <p>Email: admin@poltkeba.ac.id Web:http://www.poltkeba.ac.id</p>
        </td>
      </tr> 
      <tr>
        <td colspan="2">
          <hr>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="judul">
          <h4>
            REKAPITULASI STOCK OPNAME BAHAN HABIS PAKAI LABORATORIUM TEKNIK ELEKTRO PRODI TEKNIK ELEKTRONIKA
          </h4>
        </td>
      </tr>
      <tr>
        @php
            // date_default_timezone_set('Asia/Makassar');
            $getTime = date("j F Y");
        @endphp
        
        <td colspan="2">
          Periode : {{ $getTime }}
        </td>
      </tr>
    </table>

    <table class='table-info' width='100%' border="10px" cellpadding='10px' cellspacing='0px'>
      <thead>
        <tr>
          <th class="thead">No</th>
          <th class="thead">Nama Alat & Bahan</th>
          <th class="thead">Tanggal Masuk <br>Barang</th>
          <th class="thead">Stock Awal</th>
          <th class="thead">Satuan</th>
          <th class="thead">Lab</th>
          <th class="thead">Keterangan</th>
        </tr>
      </thead>
      @php
      $nomor = 1;
      @endphp
      <tbody>
        {{-- @forelse ( $items as $item) --}}
        @forelse ($data as $item)
        <tr>
          <td>{{ $nomor++ }}</td>
          <td align="center">{!! $item->nama !!}</td>
          <td align="center">{{ date('d/n/Y', strtotime($item->created_at)) }}</td>
          <td align="center">{{ $item->jumlah}}</td>
          <td align="center">{{ $item->satuan }}</td>
          <td align="center">{{ $item->labs->name }}</td>
          
          <td>&nbsp;</td>
        </tr>
        @empty
        <tr>
          <td colspan="8" class="text-center" value="language"></td>
        </tr>
        @endforelse

      </tbody>

    </table>
    
    <table class="" width='100%'>
        <td height="50px" colspan="3">
          
        </td>
      </tr>
      <tr class="ttd">
        <td class='jabatan' >
            Disusun oleh,<br>
            Teknisi Laboratorium
        </td>
        <td class='jabatan'>
            Diverifikasi oleh,<br>
            Kepala Laboratorium<br>
            Prodi Teknik Elektronika
        </td>
        <td class='jabatan'>
            Disahkan oleh,<br>
            Ketua Jurusan Teknik Elektro
        </td>
      </tr>
      <tr class="ttd">
        <td class='jabatan' colspan="3" height='70px'>
        </td>
      </tr>
      <tr class="ttd">
        <td class='jabatan' >
            Slamet Widodo, A.Md. T.<br>
            NIP. 198912282019031017
        </td>
        <td class='jabatan'>
            Ihsan, S.Kom., M.T.<br>
            NIP. 199008272019031011<br>
        </td>
        <td class='jabatan'>
            Drs Armin, M.T.<br>
            NIP. 196408211988031006
        </td>
      </tr>
    </table>


  </section>
  
<script src{{ url('frontend/scripts/script.js') }}></script>  
</body>
</html>
