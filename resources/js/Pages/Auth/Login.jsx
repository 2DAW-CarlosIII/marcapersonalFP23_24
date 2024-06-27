import { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, useForm } from '@inertiajs/react';
import { useNavigate, Link } from 'react-router-dom';
import {useCheckAuth, useLogin, useNotify, useSafeSetState, } from 'ra-core';
import EmailDomains from '@/Components/EmailDomains';

export const Login = (props) => {

    const { data, setData, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });
    const canResetPassword = true;

    const { redirectTo, className } = props;
    const [loading, setLoading] = useSafeSetState(false);
    const login = useLogin();
    const notify = useNotify();

    const checkAuth = useCheckAuth();
    const navigate = useNavigate();
    useEffect(() => {
        checkAuth({}, false)
            .then(() => {
                // already authenticated, redirect to the home page
                navigate('/');
            })
            .catch(() => {
                // not authenticated, stay on the login page
            });
    }, [checkAuth, navigate]);

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (values) => {
        values.preventDefault()
        setLoading(true);
        login({
            email: email.value,
            password: password.value,
            rememberChecked: values.target.elements.remember.checked
        })
        .then(() => {
                setLoading(false);
            })
        .catch(error => {
                setLoading(false);
                notify(
                    typeof error === 'string'
                        ? error
                        : typeof error === 'undefined' || !error.message
                        ? 'ra.auth.sign_in_error'
                        : error.message,
                    {
                        type: 'error',
                        messageArgs: {
                            _:
                                typeof error === 'string'
                                    ? error
                                    : error && error.message
                                    ? error.message
                                    : undefined,
                        },
                    }
                );
            });
    };

    return (
        <GuestLayout >
            <Head title="Log in" />

            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="email"
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
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
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="block mt-4">
                    <label className="flex items-center">
                        <Checkbox
                            name="remember"
                            checked={data.remember}
                            onChange={(e) => setData('remember', e.target.checked)}
                        />
                        <span className="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div className="flex items-center justify-end mt-4">
                    {canResetPassword && (
                        <Link to="/forgot-password"
                            className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Forgot your password?
                        </Link>
                    )}

                    <PrimaryButton className="ms-4" disabled={processing}>
                        Log in
                    </PrimaryButton>
                </div>
            </form>

            <div className="block mt-4">
                <label className="flex items-center">
                    <span className="ms-2 text-sm text-gray-600">Not Registered</span>
                    <Link to="/register"
                            className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Sign Up
                    </Link>
                </label>
            </div>
        </GuestLayout>
    );
}
