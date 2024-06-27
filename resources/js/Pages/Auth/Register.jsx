import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, useForm } from '@inertiajs/react';
import { useNavigate, Link } from 'react-router-dom';
import { dataProvider } from '../../react-admin/dataProvider';
import EmailDomains from '@/Components/EmailDomains';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        nombre: '',
        apellidos: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const navigate = useNavigate();

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        dataProvider.postRegister({
            nombre: nombre.value,
            apellidos: apellidos.value,
            email: email.value,
            password: password.value,
            password_confirmation: password_confirmation.value,
        }).then(() => {
            navigate('/dashboard');
        }).catch((error) => {
            throw new Error(error.message)
        });
    };

    return (
        <GuestLayout>
            <Head title="Register" />

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="nombre" value="nombre" />

                    <TextInput
                        id="nombre"
                        name="nombre"
                        value={data.nombre}
                        className="mt-1 block w-full"
                        autoComplete="nombre"
                        isFocused={true}
                        onChange={(e) => setData('nombre', e.target.value)}
                        required
                    />

                    <InputError message={errors.nombre} className="mt-2" />
                </div>
                <div>
                    <InputLabel htmlFor="apellidos" value="apellidos" />

                    <TextInput
                        id="apellidos"
                        name="apellidos"
                        value={data.apellidos}
                        className="mt-1 block w-full"
                        autoComplete="apellidos"
                        isFocused={true}
                        onChange={(e) => setData('apellidos', e.target.value)}
                        required
                    />

                    <InputError message={errors.apellidos} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="email"
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />
                    <EmailDomains className="mt-2" />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="password_confirmation" value="Confirm Password" />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                        required
                    />

                    <InputError message={errors.password_confirmation} className="mt-2" />
                </div>

                <div className="flex items-center justify-end mt-4">
                    <Link
                        to="/dashboard/login"
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton className="ms-4" disabled={processing}>
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
