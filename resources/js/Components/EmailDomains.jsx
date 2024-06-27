export default function EmailDomains({ className = '', ...props }) {
    return (
        <label {...props} className={`block font-medium text-sm text-gray-700 ` + className}>
                <p><strong>email de estudiantes = </strong><em>@{import.meta.env.VITE_STUDENT_EMAIL_DOMAIN}</em></p>
                <p><strong>email de docentes = </strong><em>@{import.meta.env.VITE_TEACHER_EMAIL_DOMAIN}</em></p>
        </label>
    );
}
